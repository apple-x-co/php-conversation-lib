<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/30
 * Time: 10:39
 */

namespace Conversation;


use Conversation\AbstractConversationEvent;

class ConversationWorkflowActivity
{
    /** @var bool */
    private $started;

    /** @var bool */
    private $quitted;

    /** @var bool */
    private $aborted;

    /** @var int */
    private $workflow_sequence_index;

    /** @var AbstractConversationEvent[] */
    private $conversation_events;

    /**
     * ConversationWorkflowActivity constructor.
     */
    public function __construct()
    {
        $this->started                 = false;
        $this->quitted                 = false;
        $this->aborted                 = false;
        $this->workflow_sequence_index = 0;
        $this->conversation_events     = [];
    }

    /**
     * @return bool
     */
    public function isStarted()
    {
        return $this->started ? true : false;
    }

    /**
     * @return bool
     */
    public function isQuitted()
    {
        return $this->quitted ? true : false;
    }

    /**
     * @return bool
     */
    public function isAborted()
    {
        return $this->aborted ? true : false;
    }

    /**
     *
     */
    public function begin()
    {
        $this->started                 = true;
        $this->quitted                 = false;
        $this->aborted                 = false;
        $this->workflow_sequence_index = 0;
    }

    /**
     *
     */
    public function finish()
    {
        $this->started                 = false;
        $this->quitted                 = true;
        $this->aborted                 = false;
        $this->workflow_sequence_index = 0;
    }

    /**
     *
     */
    public function abort()
    {
        $this->started                 = false;
        $this->quitted                 = false;
        $this->aborted                 = true;
        $this->workflow_sequence_index = 0;
        $this->conversation_events     = [];
    }

    /**
     * @param $index
     */
    public function setWorkflowSequenceIndex($index)
    {
        $this->workflow_sequence_index = $index;
    }

    /**
     * @return int
     */
    public function getWorkflowSequenceIndex()
    {
        return $this->workflow_sequence_index;
    }

    /**
     * @param string $sequence_id
     * @param AbstractConversationEvent $conversationEvent
     */
    public function addConversationEvent($sequence_id, $conversationEvent)
    {
        if ( ! array_key_exists($sequence_id, $this->conversation_events)) {
            $this->conversation_events[$sequence_id] = [];
        }

        $this->conversation_events[$sequence_id][] = $conversationEvent;
    }

    /**
     * @param string $sequence_id
     *
     * @return AbstractConversationEvent
     */
    public function getConversationEventFromSequenceId($sequence_id)
    {
        if ( ! array_key_exists($sequence_id, $this->conversation_events)) {
            return null;
        }

        return $this->conversation_events[$sequence_id][count($this->conversation_events[$sequence_id]) - 1];
    }
}