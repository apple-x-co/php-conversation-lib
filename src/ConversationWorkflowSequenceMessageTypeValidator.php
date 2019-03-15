<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/19
 * Time: 17:36
 */

namespace Conversation;


use Conversation\AbstractConversationEvent;

class ConversationWorkflowSequenceMessageTypeValidator implements ConversationWorkflowSequenceMessageValidatorInterface
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @param AbstractConversationEvent $event
     *
     * @return bool
     */
    public function validate($event)
    {
        if ($event->getType() === $this->type) {
            return true;
        }

        return false;
    }
}