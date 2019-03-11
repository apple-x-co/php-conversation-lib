<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


class ConversationEventHandlerContext
{
    /** @var  mixed[] */
    private $data;

    /**
     * ConversationEventHandlerContext constructor.
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function exists($key)
    {
        return array_key_exists($key, $this->data) ? true : false;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->data[$key];
    }
}