<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/20
 * Time: 12:37
 */

namespace Conversation;


use Conversation\AbstractConversationMessage;

class ConversationWorkflowSequenceMessage implements ConversationWorkflowSequenceMessageInterface
{
    /** @var AbstractConversationMessage[] */
    private $conversation_messages;

    /**
     * ConversationWorkflowSequenceMessage constructor.
     *
     * @param AbstractConversationMessage[] $conversation_messages
     */
    public function __construct($conversation_messages)
    {
        $this->conversation_messages = $conversation_messages;
    }

    /**
     * @return AbstractConversationMessage[]
     */
    public function getConversationMessages()
    {
        return $this->conversation_messages;
    }
}