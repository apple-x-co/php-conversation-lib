<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexBubbleSize implements FlexPropertyInterface
{
    const NANO = 'nano';
    const MICRO = 'micro';
    const KILO = 'kilo';
    const MEGA = 'mega';
    const GIGA = 'giga';

    /** @var string */
    private $type;

    /**
     * FlexDirection constructor.
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
     * @return FlexBubbleSize
     */
    public static function naon()
    {
        return new static(static::NANO);
    }

    /**
     * @return FlexBubbleSize
     */
    public static function micro()
    {
        return new static(static::MICRO);
    }

    /**
     * @return FlexBubbleSize
     */
    public static function kilo()
    {
        return new static(static::KILO);
    }

    /**
     * @return FlexBubbleSize
     */
    public static function mega()
    {
        return new static(static::MEGA);
    }

    /**
     * @return FlexBubbleSize
     */
    public static function giga()
    {
        return new static(static::GIGA);
    }

}