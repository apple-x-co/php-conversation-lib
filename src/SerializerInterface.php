<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/22
 * Time: 16:33
 */

namespace Conversation;


interface SerializerInterface
{
    /**
     * @param mixed $value
     *
     * @return string
     */
    public function serialize($value);

    /**
     * @param string $value
     *
     * @return mixed
     */
    public function unserialize($value);
}