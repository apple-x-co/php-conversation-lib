<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:15
 */

namespace Conversation\ConversationMessage\Flex\Component;


interface FlexComponentInterface
{
    /**
     * @return FlexComponentType
     */
    public function getComponentType();
}