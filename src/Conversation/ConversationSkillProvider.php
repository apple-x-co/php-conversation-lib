<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/29
 * Time: 18:03
 */

namespace Conversation;


class ConversationSkillProvider
{
    /** @var ConversationSkillInterface[] */
    private $skills;

    /**
     * ConversationSkillProvider constructor.
     *
     * @param ConversationSkillInterface[] $skills
     */
    public function __construct($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @param ConversationEventHandlerContext $context
     *
     * @return AbstractConversationMessage[]
     */
    public function applySkill($context)
    {
        $messages = [];

        foreach ($this->skills as $skill) {
            if ( ! $skill->accept($context)) {
                continue;
            }

            $result = $skill->apply($context);
            if ( ! $result->isApplied()) {
                continue;
            }

            $messages = array_merge($messages, $result->getMessages());
            if ($result->isShutdown()) {
                break;
            }
        }

        return $messages;
    }
}