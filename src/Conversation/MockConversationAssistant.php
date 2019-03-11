<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


use Conversation\ConversationEvent\ConversationFollowEvent;
use Conversation\ConversationEvent\ConversationPostbackEvent;
use Conversation\ConversationEvent\ConversationUnfollowEvent;
use Conversation\ConversationEvent\ConversationMessageTextEvent;
use Conversation\ConversationEvent\ConversationMessageImageEvent;
use Conversation\ConversationMessage\ConversationCarouselMessage;
use Conversation\ConversationMessage\ConversationImageMessage;
use Conversation\ConversationMessage\ConversationConfirmMessage;
use Conversation\ConversationMessage\ConversationMultipleActionMessage;
use Conversation\ConversationMessage\ConversationTextMessage;
use Conversation\HTTP\Response;
use Conversation\Exception\FileNotfoundException;
use Conversation\ConversationMessageType;

class MockConversationAssistant implements ConversationAssistantInterface
{
    /** @var Configure */
    private $configure;

    /** @var  Profile */
    private $profile;

    /**
     * LineConversationAssistant constructor.
     *
     * @param Configure $configure
     */
    public function __construct($configure)
    {
        $this->configure = $configure;
        $this->profile   = null;
    }

    /**
     * @return Configure
     */
    public function getConfigure()
    {
        return $this->configure;
    }

    /**
     * @param $value
     */
    private function writeLog($value)
    {
        $file   = new File($this->getLogDirectory()->getPath(), 'mock.log');
        $logger = new Logger($file);
        $logger->info($value);
    }

    /**
     * @param string $push_id
     *
     * @return void
     */
    public function hello($push_id)
    {
        $this->writeLog('Hello');
    }

    /**
     * @param AbstractConversationMessage $message
     * @param string $reply_token
     *
     * @return Response
     */
    public function say($message, $reply_token)
    {
        // TODO: Implement say() method.

        $content = null;

        if ($message->getType() === ConversationMessageType::TEXT && $message instanceof ConversationTextMessage) {
            $content = $message->getText();
        } elseif ($message->getType() === ConversationMessageType::IMAGE && $message instanceof ConversationImageMessage) {
            $content = $message->getOriginalURL()->getString();
        } elseif ($message->getType() === ConversationMessageType::CONFIRM && $message instanceof ConversationConfirmMessage) {
            $content = static::get_stdin('<' . $message->getTitle() . '>' . $message->getMessage());
        } elseif ($message->getType() === ConversationMessageType::MULTIPLE_ACTION && $message instanceof ConversationMultipleActionMessage) {
            $content = static::get_stdin('<' . $message->getTitle() . '>' . $message->getMessage());
        } elseif ($message->getType() === ConversationMessageType::CAROUSEL && $message instanceof ConversationCarouselMessage) {
            $content = 'carouse'; // TODO: CLIでも動作するようにする
        }

        if (empty($content) || is_null($content)) {
            return null;
        }

        $this->writeLog($content);

        return new Response(200, 'OK');
    }

    /**
     * @param AbstractConversationMessage $message
     * @param string $push_id
     *
     * @return Response
     */
    public function push($message, $push_id)
    {
        $content = null;

        if ($message->getType() === ConversationMessageType::TEXT && $message instanceof ConversationTextMessage) {
            $content = $message->getText();
        }

        if (empty($content) || is_null($content)) {
            return null;
        }

        $this->writeLog($content);

        return new Response(200, 'OK');
    }

    /**
     * @param AbstractConversationMessage $message
     * @param string[] $push_ids
     *
     * @return Response
     */
    public function multicast($message, $push_ids)
    {
        $content = null;

        if ($message->getType() === ConversationMessageType::TEXT && $message instanceof ConversationTextMessage) {
            $content = $message->getText();
        }

        if (empty($content) || is_null($content)) {
            return null;
        }

        $this->writeLog($content);

        return new Response(200, 'OK');
    }

    /**
     * @return AbstractConversationEvent[]
     */
    public function take()
    {
        $input_event_type = static::get_stdin('Event type');
        if ($input_event_type === '') {
            return [];
        }

        $conversation_events = [];

        if ($input_event_type === 'follow') {
            $conversation_events[] = new ConversationFollowEvent();
        } elseif ($input_event_type === 'unfollow') {
            $conversation_events[] = new ConversationUnfollowEvent();
        } elseif ($input_event_type === 'message') {
            $input_sub_event_type = static::get_stdin('Sub event type');
            if ($input_sub_event_type === 'text') {
                $input_message_text    = static::get_stdin('Message text');
                $conversation_events[] = new ConversationMessageTextEvent($input_message_text);
            } elseif ($input_sub_event_type === 'image') {
                $input_message_image_path = static::get_stdin('Message image path');
                $image_content            = File::get_contents($input_message_image_path);
                $mime_type                = File::get_mine_type($input_message_image_path);
                $uploadFile               = new UploadFile($mime_type, $image_content);
                $file                     = $uploadFile->save($this->getUploadTemporaryDirectory()->getPath());
                $conversation_events[]    = new ConversationMessageImageEvent($file);
            }
        } elseif ($input_event_type === 'postback') {
            $input_postback_data   = static::get_stdin('Postback data');
            $conversation_events[] = new ConversationPostbackEvent($input_postback_data);
        }

        return $conversation_events;
    }

    /**
     * @param string $user_id
     *
     * @return Profile
     */
    public function getProfile($user_id)
    {
        if ( ! empty($this->profile)) {
            return $this->profile;
        }

        $display_name = static::get_stdin('profile display name');
        $user_id      = static::get_stdin('profile user id');
        $url          = static::get_stdin('profile picture url name');
        $status       = static::get_stdin('profile status message');

        $this->profile = new Profile(
            $display_name,
            $user_id,
            empty($url) ? null : new URL($url),
            $status
        );

        return $this->profile;
    }

    /**
     * @param string|null $message
     *
     * @return string
     */
    private static function get_stdin($message = null)
    {
        if ( ! is_null($message)) {
            print '[' . $message . ']: ';
        }
        $input = trim(fgets(STDIN));

        return $input;
    }

    /**
     * @return File
     */
    private function getLogDirectory()
    {
        $directory = new File($this->configure->read('Log.directoryPath'));
        if ( ! $directory->exists()) {
            throw new FileNotfoundException();
        }

        return $directory;
    }

    /**
     * @return File
     */
    private function getUploadTemporaryDirectory()
    {
        $directory = new File($this->configure->read('Upload.temporaryDirectoryPath'));
        if ( ! $directory->exists()) {
            throw new FileNotfoundException();
        }

        return $directory;
    }

    /**
     * @return mixed
     */
    public function core()
    {
        // TODO: Implement core() method.
    }

    /**
     * Native api call
     *
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function call($callback)
    {
        // TODO: Implement call() method.
    }
}
