<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/24
 * Time: 18:21
 */

namespace Conversation;


class Session implements ConversationPersistentSerializable
{
    /** @var mixed[] */
    private $data;

    /** @var string */
    private $user_id;

    /** @var int */
    private $expires;

    /** @var string */
    private $name;

    /**
     * @param string $user_id
     * @param string $name
     *
     * PersistentTest constructor.
     */
    public function __construct($user_id, $name = null)
    {
        $this->data    = [];
        $this->user_id = $user_id;
        $this->expires = null;
        $this->name    = $name;
    }

    /**
     *
     */
    public function __wakeup()
    {
        $this->validateExpires();
    }

    /**
     *
     */
    private function validateExpires()
    {
        if (is_null($this->expires) || $this->expires > time()) {
            return;
        }
        $this->data = [];
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     */
    public function removeData($key)
    {
        if ( ! array_key_exists($key, $this->data)) {
            return;
        }
        unset($this->data[$key]);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getData($key)
    {
        $this->validateExpires();

        if ( ! array_key_exists($key, $this->data)) {
            return null;
        }

        return $this->data[$key];
    }

    /**
     * @param $key
     */
    public function addData($key, $value)
    {
        $this->validateExpires();

        if ( ! array_key_exists($key, $this->data)) {
            $this->data[$key] = [];
        }

        $this->data[$key][] = $value;
    }

    /**
     * @return array
     */
    public function getDataKeys()
    {
        return array_keys($this->data);
    }

    /**
     * @return string serialize string
     */
    public function serialize()
    {
        $serializer = SerializerFactory::createSerializer(true);
        return $serializer->serialize($this);
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $timestamp
     */
    public function setExpires($timestamp)
    {
        $this->expires = $timestamp;
    }

    /**
     * @return int
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
