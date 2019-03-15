<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 17:40
 */

namespace Conversation;


use Conversation\AbstractConversationMessage;

class ConversationWorkflowSequence
{
    /** @var string */
    private $id;

    /** @var ConversationWorkflowSequenceMessageInterface */
    private $sequenceMessage;

    /** @var ConversationWorkflowSequenceMessageValidatorInterface */
    private $validator;

    /** @var bool */
    private $skippable;

    /**
     * ConversationWorkflowSequence constructor.
     *
     * @param string $id
     * @param ConversationWorkflowSequenceMessageInterface $sequenceMessage
     * @param ConversationWorkflowSequenceMessageValidatorInterface $validator
     * @param bool $skippable
     */
    public function __construct($id, $sequenceMessage, $validator, $skippable = false)
    {
        $this->id              = $id;
        $this->sequenceMessage = $sequenceMessage;
        $this->validator       = $validator;
        $this->skippable       = $skippable;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return AbstractConversationMessage[]
     */
    public function getConversationMessages()
    {
        return $this->sequenceMessage->getConversationMessages();
    }

    /**
     * @return ConversationWorkflowSequenceMessageValidatorInterface
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @return bool
     */
    public function isSkippable()
    {
        return $this->skippable ? true : false;
    }
}