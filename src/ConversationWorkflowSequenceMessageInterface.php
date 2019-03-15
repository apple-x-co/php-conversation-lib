<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 17:40
 */

namespace Conversation;


use Conversation\AbstractConversationMessage;

interface ConversationWorkflowSequenceMessageInterface
{
    /**
     * @return AbstractConversationMessage[]
     */
    public function getConversationMessages();
}