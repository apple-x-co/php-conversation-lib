<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/22
 * Time: 16:34
 */

namespace Conversation\Serializer;


use Conversation\SerializerInterface;

class Serializer implements SerializerInterface
{

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function serialize($value)
    {
        return serialize($value);
    }

    /**
     * @param string $value
     *
     * @return mixed
     */
    public function unserialize($value)
    {
        return unserialize($value);
    }
}