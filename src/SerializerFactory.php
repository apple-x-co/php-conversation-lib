<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/22
 * Time: 16:31
 */

namespace Conversation;


use Conversation\Serializer\MsgPack;
use Conversation\Serializer\Serializer;

class SerializerFactory
{
    /**
     * @return SerializerInterface
     */
    public static function createSerializer($use_built_in_architecture = false)
    {
        if (function_exists('msgpack_pack') && ! $use_built_in_architecture) {
            return new MsgPack();
        }

        return new Serializer();
    }
}