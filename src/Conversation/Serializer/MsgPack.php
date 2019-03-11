<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/22
 * Time: 16:34
 */

namespace Conversation\Serializer;


use Conversation\SerializerInterface;

class MsgPack implements SerializerInterface
{

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function serialize($value)
    {
        return msgpack_pack($value);
    }

    /**
     * @param string $value
     *
     * @return mixed
     */
    public function unserialize($value)
    {
        return msgpack_unpack($value);
    }
}