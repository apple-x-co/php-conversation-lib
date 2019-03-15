<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/29
 * Time: 18:03
 */

namespace Conversation;


class ConversationWorkflowProvider
{
    /** @var ConversationWorkflow[] */
    private $workflows;

    /**
     * ConversationWorkflowProvider constructor.
     *
     * @param ConversationWorkflow[] $workflows
     */
    public function __construct($workflows)
    {
        $this->workflows = $workflows;
    }

    /**
     * @param $keyword
     *
     * @return ConversationWorkflow|null
     */
    public function get($keyword)
    {
        foreach ($this->workflows as $workflow) {
            if ($workflow->isMatch($keyword)) {
                return $workflow;
            }
        }

        return null;
    }
}