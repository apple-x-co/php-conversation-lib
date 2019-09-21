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
     * $context の内容を処理できる場合は true を返す
     *
     * @param ConversationEventHandlerContext $context
     *
     * @return bool
     */
    public function accept($context);

    /**
     * $context の内容を処理する
     *
     * @param  ConversationEventHandlerContext $context
     *
     * @return ConversationSkillResult
     */
    public function apply($context);
}
