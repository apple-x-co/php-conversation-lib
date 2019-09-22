<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexDecoration implements FlexPropertyInterface
{
    const NONE = 'none';
    const UNDERLINE = 'underline';
    const LINE_THROUGH = 'line-through';

    /** @var string */
    private $type;

    /**
     * FlexFontWeight constructor.
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
     * @return FlexDecoration
     */
    public static function none()
    {
        return new static(static::NONE);
    }

    /**
     * @return FlexDecoration
     */
    public static function underline()
    {
        return new static(static::UNDERLINE);
    }

    /**
     * @return FlexDecoration
     */
    public static function line_through()
    {
        return new static(static::LINE_THROUGH);
    }
}