<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


interface ConversationPersistentSerializable
{
    /**
     * @return string serialize string
     */
    public function serialize();

    /**
     * @return string
     */
    public function getUserId();

    /**
     * @return mixed
     */
    public function getName();
}