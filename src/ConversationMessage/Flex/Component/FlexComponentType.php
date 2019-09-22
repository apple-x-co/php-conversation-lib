<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/04
 * Time: 8:15
 */

namespace Conversation\ConversationMessage\Flex\Component;


class FlexComponentType
{
    const TEXT = 'text';
    const SPAN = 'span';
    const IMAGE = 'image';
    const BOX = 'box';
    const SEPARATOR = 'separator';
    const FILLER = 'filler';
    const BUTTON = 'button';
    const ICON = 'icon';
    const SPACER = 'spacer';

    /** @var string */
    private $type;

    /**
     * FlexComponentType constructor.
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