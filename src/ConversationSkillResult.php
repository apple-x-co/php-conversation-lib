<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/02
 * Time: 10:08
 */

namespace Conversation;


class ConversationSkillResult
{
    /** @var bool */
    private $applied;

    /** @var bool */
    private $shutdown;

    /** @var AbstractConversationMessage[] */
    private $conversation_messages;

    /**
     * ConversationSkillResult constructor.
     *
     * @param bool $applied
     * @param bool $shutdown
     * @param AbstractConversationMessage[]
     */
    public function __construct($applied, $shutdown, $conversation_messages = [])
    {
        $this->applied               = $applied;
        $this->shutdown              = $shutdown;
        $this->conversation_messages = $conversation_messages;
    }

    /**
     * @return bool
     */
    public function isApplied()
    {
        return $this->applied ? true : false;
    }

    /**
     * @return bool
     */
    public function isShutdown()
    {
        return $this->shutdown ? true : false;
    }

    /**
     * @param AbstractConversationMessage $message
     */
    public function addConversationMessage($message)
    {
        $this->conversation_messages[] = $message;
    }

    /**
     * @return AbstractConversationMessage[]
     */
    public function getMessages()
    {
        return $this->conversation_messages;
    }
}