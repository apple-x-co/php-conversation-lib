<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/04
 * Time: 17:09
 */

namespace Conversation;


use Conversation\AbstractConversationEvent;
use Conversation\AbstractConversationMessage;
use Conversation\ConversationEvent\ConversationMessageTextEvent;

class ConversationWorkflowProcessor
{
    /** @var ConversationWorkflowProcessor */
    private $workflow;

    /** @var ConversationWorkflowActivity */
    private $activity;

    /**
     * ConversationWorkflowCoordinator constructor.
     *
     * @param ConversationWorkflow $workflow
     * @param ConversationWorkflowActivity $activity
     */
    public function __construct($workflow, $activity)
    {
        $this->workflow = $workflow;
        $this->activity = $activity;
    }

    /**
     * @param AbstractConversationEvent $conversationEvent
     *
     * @return ConversationWorkflowActivity
     */
    public function process($conversationEvent)
    {
        if (empty($this->workflow) || empty($this->activity)) {
            return null;
        }

        $activity = clone $this->activity;

        if ( ! $activity->isStarted()) {
            $activity->begin();

            return $activity;
        }

        if ($conversationEvent instanceof ConversationMessageTextEvent) {
            if ( ! $this->workflow->canContinue($conversationEvent->getContent())) {
                $activity->abort();

                return $activity;
            }
        }

        $sequence_index = $activity->getWorkflowSequenceIndex();
        $sequence       = $this->workflow->getSequenceOfIndex($sequence_index);
        $sequence_valid = $sequence->getValidator()->validate($conversationEvent);

        if ( ! $sequence_valid && ! $sequence->isSkippable()) {
            return $activity;
        }

        if ($sequence_valid) {
            $activity->addConversationEvent($sequence->getId(), $conversationEvent);
        }

        $next_sequence_index = $sequence_index + 1;

        if ($this->workflow->existsSequenceIndex($next_sequence_index)) {
            $activity->setWorkflowSequenceIndex($next_sequence_index);
        } else {
            $activity->finish();
        }

        return $activity;
    }
}