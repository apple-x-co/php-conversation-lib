<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/04
 * Time: 8:15
 */

namespace Conversation\ConversationMessage\Flex\Container;


class FlexContainerType
{
    const BUBBLE = 'bubble';
    const CAROUSEL = 'carousel';

    /** @var string */
    private $type;

    /**
     * FlexContainerType constructor.
     *
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}