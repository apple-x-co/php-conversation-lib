<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


class ConversationWorkflow
{
    /** @var string */
    private $version;

    /** @var string */
    private $id;

    /** @var string */
    private $title;

    /** @var ConversationWorkflowRule */
    private $rule;

    /** @var ConversationWorkflowSequence[] */
    private $sequences;

    /** @var string[] */
    private $handler_classes;

    /**
     * ConversationWorkflow constructor.
     *
     * @param string $version
     * @param string $id
     * @param string $title
     * @param ConversationWorkflowRule $rule
     * @param ConversationWorkflowSequence[] $sequences
     * @param string $handler_classes
     */
    public function __construct($version, $id, $title, $rule, $sequences, $handler_classes)
    {
        $this->version         = $version;
        $this->id              = $id;
        $this->title           = $title;
        $this->rule            = $rule;
        $this->sequences       = $sequences;
        $this->handler_classes = $handler_classes;
    }

    /**
     * @return ConversationWorkflowRule
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * @param $index
     *
     * @return ConversationWorkflowSequence
     */
    public function getSequenceOfIndex($index)
    {
        if (count($this->sequences) <= $index) {
            return null;
        }

        return $this->sequences[$index];
    }

    /**
     * @param $index
     *
     * @return bool
     */
    public function existsSequenceIndex($index)
    {
        if (count($this->sequences) > $index) {
            return true;
        }

        return false;
    }

    /**
     * @param $key
     *
     * @return string
     */
    public function getHandlerClassName($key)
    {
        if ( ! array_key_exists($key, $this->handler_classes)) {
            return null;
        }

        return $this->handler_classes[$key];
    }

    /**
     * @param $version
     *
     * @return bool
     */
    public function isAvailable($version)
    {
        if ( ! empty($this->version) && ! is_null($this->version) && $this->version === $version) {
            return true;
        }

        return false;
    }

    /**
     * @param $keyword
     *
     * @return bool
     */
    public function isMatch($keyword)
    {
        return $this->getRule()->isMatch($keyword);
    }

    /**
     * @param $keyword
     *
     * @return bool
     */
    public function canContinue($keyword)
    {
        return $this->getRule()->canContinue($keyword);
    }
}