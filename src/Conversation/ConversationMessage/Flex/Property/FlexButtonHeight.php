<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexButtonHeight implements FlexPropertyInterface
{
    const SM = 'sm';
    const MD = 'md';

    /** @var string */
    private $type;

    /**
     * FlexFontSize constructor.
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

    /**
     * @return FlexButtonHeight
     */
    public static function sm()
    {
        return new static(static::SM);
    }

    /**
     * @return FlexButtonHeight
     */
    public static function md()
    {
        return new static(static::MD);
    }
}