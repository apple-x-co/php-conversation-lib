<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/04
 * Time: 8:10
 */

namespace Conversation\ConversationMessage\Flex\Container;


interface FlexContainerInterface
{
    /**
     * @return FlexContainerType
     */
    public function getType();
}