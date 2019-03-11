<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/06
 * Time: 17:21
 */

namespace Conversation;


use Conversation\AbstractConversationMessage;

interface ConversationWorkflowEventHandlerInterface
{
    /**
     * @param ConversationWorkflow $workflow
     * @param ConversationWorkflowActivity $activity
     *
     * @return AbstractConversationMessage
     */
    public function handle($workflow, $activity);
}