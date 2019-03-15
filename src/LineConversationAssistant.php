<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;

use Conversation\ConversationEvent\ConversationFollowEvent;
use Conversation\ConversationEvent\ConversationMessageImageEvent;
use Conversation\ConversationEvent\ConversationMessageLocationEvent;
use Conversation\ConversationEvent\ConversationMessageStickerEvent;
use Conversation\ConversationEvent\ConversationPostbackEvent;
use Conversation\ConversationEvent\ConversationUnfollowEvent;
use Conversation\ConversationEvent\ConversationMessageTextEvent;
use Conversation\ConversationMessage\ConversationTextMessage;
use Conversation\Exception\FileNotfoundException;
use Conversation\HTTP\Response;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\Event\MessageEvent\ImageMessage;
use LINE\LINEBot\Event\MessageEvent\LocationMessage;
use LINE\LINEBot\Event\MessageEvent\StickerMessage;
use LINE\LINEBot\Event\PostbackEvent;
use Psr\Log\LoggerAwareTrait;

class LineConversationAssistant implements ConversationAssistantInterface
{
    use LoggerAwareTrait;

    /** @var Configure */
    private $configure;

    /** @var LINEBot */
    private static $linebot = null;

    /** @var array */
    private $events;

    /**
     * LineConversationAssistant constructor.
     *
     * @param Configure $configure
     */
    public function __construct($configure)
    {
        $this->configure = $configure;
        $this->events    = null;
    }

    /**
     * @return Configure
     */
    public function getConfigure()
    {
        return $this->configure;
    }

    /**
     * @param mixed $message
     * @param array $context
     */
    private function writeLog($message, $context)
    {
        $this->logger->info($message, $context);
    }

    /**
     * @return mixed|LINEBot
     */
    public function core()
    {
        return $this->getLINEBot();
    }

    /**
     * @return LINEBot
     */
    private function getLINEBot()
    {
        if ( ! empty(static::$linebot) && ! is_null(static::$linebot)) {
            return static::$linebot;
        }

        $httpClient      = new CurlHTTPClient($this->configure->read('LINE.channelToken'));
        //static::$linebot = new LINEBot($httpClient, ['channelSecret' => $this->configure->read('LINE.channelSecret')]);
        static::$linebot = new \Conversation\LINE\LINEBot($httpClient, ['channelSecret' => $this->configure->read('LINE.channelSecret')]);

        return static::$linebot;
    }

    /**
     * @return LINEBot\Event\BaseEvent[]
     */
    public function getAllEvents()
    {
        if ( ! empty($this->events)) {
            return $this->events;
        }

        $bot          = $this->getLINEBot();
        $signature    = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
        $events       = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
        $this->events = $events;

        return $events;
    }

    /**
     * @param string $push_id
     *
     * @return void
     */
    public function hello($push_id)
    {
        $message = new ConversationTextMessage('Hello');
        $this->push($message, $push_id);
    }

    /**
     * @param AbstractConversationMessage $message
     * @param string $reply_token
     *
     * @return Response
     */
    public function say($message, $reply_token)
    {
        $messageBuilder = LineFacade::transformMessage($message);
        if (empty($messageBuilder) || is_null($messageBuilder)) {
            return null;
        }

        $bot      = $this->getLINEBot();
        $response = $bot->replyMessage($reply_token, $messageBuilder);

        if ( ! $response->isSucceeded()) {
            error_log($response->getRawBody());
        }

        return new Response($response->getHTTPStatus(), $response->getRawBody(), $response->getHeaders());
    }

    /**
     * @param AbstractConversationMessage $message
     * @param string $push_id
     *
     * @return Response
     */
    public function push($message, $push_id)
    {
        $messageBuilder = LineFacade::transformMessage($message);
        if (empty($messageBuilder) || is_null($messageBuilder)) {
            return null;
        }

        $bot      = $this->getLINEBot();
        $response = $bot->pushMessage($push_id, $messageBuilder);

        return new Response($response->getHTTPStatus(), $response->getRawBody(), $response->getHeaders());
    }

    /**
     * @param AbstractConversationMessage $message
     * @param string[] $push_ids
     *
     * @return Response
     */
    public function multicast($message, $push_ids)
    {
        $messageBuilder = LineFacade::transformMessage($message);
        if (empty($messageBuilder) || is_null($messageBuilder)) {
            return null;
        }

        $bot      = $this->getLINEBot();
        $response = $bot->multicast($push_ids, $messageBuilder);

        return new Response($response->getHTTPStatus(), $response->getRawBody(), $response->getHeaders());
    }

    /**
     * @return AbstractConversationEvent[]
     */
    public function take()
    {
        $line_events         = $this->getAllEvents();
        $conversation_events = [];

        foreach ($line_events as $lineEvent) {
            $conversationEvent = $this->transformEvent($lineEvent);
            if (is_null($conversationEvent)) {
                continue;
            }
            $conversation_events[] = $conversationEvent;
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
        $bot      = $this->getLINEBot();
        $response = $bot->getProfile($user_id);
        if ( ! $response->isSucceeded()) {
            return null;
        }

        $array = $response->getJSONDecodedBody();
        if ( ! is_array($array)) {
            return null;
        }

        return new Profile(
            $array['displayName'],
            $array['userId'],
            isset($array['pictureUrl']) ? new URL($array['pictureUrl']) : null,
            isset($array['statusMessage']) ? $array['statusMessage'] : null
        );
    }

    /**
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function call($callback)
    {
        $lineBot = $this->core();

        return $callback($lineBot);
    }

//    /**
//     * @param string $message_id
//     *
//     * @return null|UploadFile
//     */
//    private function getFileContentByMessageId($message_id)
//    {
//        $bot      = $this->getLINEBot();
//        $response = $bot->getMessageContent($message_id);
//        if ( ! $response->isSucceeded()) {
//            return null;
//        }
//
//        $headers    = $response->getHeaders();
//        $uploadFile = new UploadFile($headers['Content-Type'], $response->getRawBody(), $headers['Content-Length']);
//
//        return $uploadFile;
//    }

//    /**
//     * @return File
//     */
//    private function getUploadTemporaryDirectory()
//    {
//        $directory = new File($this->configure->read('Upload.temporaryDirectoryPath'));
//        if ( ! $directory->exists()) {
//            throw new FileNotfoundException();
//        }
//
//        return $directory;
//    }

    /**
     * @param \LINE\LINEBot\Event\BaseEvent $lineEvent
     *
     * @return AbstractConversationEvent
     */
    public function transformEvent($lineEvent)
    {
        $conversationEvent = null;

        if ($lineEvent->getType() === 'follow') {
            $conversationEvent = new ConversationFollowEvent();
        } elseif ($lineEvent->getType() === 'unfollow') {
            $conversationEvent = new ConversationUnfollowEvent();
        } elseif ($lineEvent->getType() === \LINE\LINEBot\Constant\ActionType::MESSAGE && $lineEvent instanceof MessageEvent) {
            if ($lineEvent->getMessageType() === \LINE\LINEBot\Constant\MessageType::TEXT && $lineEvent instanceof TextMessage) {
                $conversationEvent = new ConversationMessageTextEvent($lineEvent->getText());
            } elseif ($lineEvent->getMessageType() === \LINE\LINEBot\Constant\MessageType::IMAGE && $lineEvent instanceof ImageMessage) {
                $bot = $this->getLINEBot();
                $response = $bot->getMessageContent($lineEvent->getMessageId());
                if ($response->isSucceeded()) {
                    $headers             = $response->getHeaders();
                    $uploadFile          = new UploadFile($headers['Content-Type'], $response->getRawBody(),
                        $headers['Content-Length']);
                    $temporary_file      = tmpfile();
                    $temporary_file_meta = stream_get_meta_data($temporary_file);
                    $temporary_path      = $temporary_file_meta['uri'];
                    $file                = $uploadFile->save(dirname($temporary_path), basename($temporary_path));
                    $conversationEvent   = new ConversationMessageImageEvent($file);
                }
            } elseif ($lineEvent->getMessageType() === \LINE\LINEBot\Constant\MessageType::LOCATION && $lineEvent instanceof LocationMessage) {
                $conversationEvent = new ConversationMessageLocationEvent([
                    'title'     => $lineEvent->getTitle(),
                    'address'   => $lineEvent->getAddress(),
                    'latitude'  => $lineEvent->getLatitude(),
                    'longitude' => $lineEvent->getLongitude()
                ]);
            } elseif ($lineEvent->getMessageType() === \LINE\LINEBot\Constant\MessageType::STICKER && $lineEvent instanceof StickerMessage) {
                $conversationEvent = new ConversationMessageStickerEvent([
                    'package_id' => $lineEvent->getPackageId(),
                    'sticker_id' => $lineEvent->getStickerId()
                ]);
            }
        } elseif ($lineEvent->getType() === \LINE\LINEBot\Constant\ActionType::POSTBACK && $lineEvent instanceof PostbackEvent) {
            $conversationEvent = new ConversationPostbackEvent([
                'data'   => $lineEvent->getPostbackData(),
                'params' => $lineEvent->getPostbackParams()
            ]);
        }

        if (is_null($conversationEvent)) {
            return null;
        }

        $conversationEvent->setAttribute(LineConst::EVENT_ATTRIBUTE_TIMESTAMP, $lineEvent->getTimestamp());
        $conversationEvent->setAttribute(LineConst::EVENT_ATTRIBUTE_LINE_EVENT_SOURCE_ID, $lineEvent->getEventSourceId());
        $conversationEvent->setAttribute(LineConst::EVENT_ATTRIBUTE_LINE_REPLY_TOKEN, $lineEvent->getReplyToken());
        $conversationEvent->setAttribute(LineConst::EVENT_ATTRIBUTE_LINE_USER_ID, $lineEvent->getUserId());

        return $conversationEvent;
    }
}
