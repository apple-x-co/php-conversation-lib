<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:30
 */

namespace Conversation;


abstract class AbstractConversationMessage
{
    /**
     * @return string
     */
    abstract public function getType();
}