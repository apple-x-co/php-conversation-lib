<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/02
 * Time: 10:00
 */

namespace Conversation;


interface ConversationSkillInterface
{
    /**
     * @param ConversationEventHandlerContext $context
     *
     * @return bool
     */
    public function accept($context);

    /**
     * @param  ConversationEventHandlerContext $context
     *
     * @return ConversationSkillResult
     */
    public function apply($context);
}