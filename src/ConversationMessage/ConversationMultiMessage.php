<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationMessage;

use Conversation\AbstractConversationMessage;
use Conversation\ConversationMessageType;

class ConversationMultiMessage extends AbstractConversationMessage
{
    /** @var AbstractConversationMessage[] */
    private $messages;

    /**
     * ConversationTextMessage constructor.
     */
    public function __construct()
    {
        $this->messages = [];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::MULTI;
    }

    public function addMessage($message)
    {
        array_push($this->messages, $message);
    }

    /**
     * @return AbstractConversationMessage[]
     */
    public function getMessages()
    {
        return $this->messages;
    }
}