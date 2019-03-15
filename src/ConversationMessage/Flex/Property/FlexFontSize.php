<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexFontSize implements FlexPropertyInterface
{
    const XXS = 'xxs';
    const XS = 'xs';
    const SM = 'sm';
    const MD = 'md';
    const LG = 'lg';
    const XL = 'xl';
    const XXL = 'xxl';
    const XXXL = '3xl';
    const XXXXL = '4xl';
    const XXXXXL = '5xl';

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
     * @return FlexFontSize
     */
    public static function xxs()
    {
        return new static(static::XXS);
    }

    /**
     * @return FlexFontSize
     */
    public static function xs()
    {
        return new static(static::XS);
    }

    /**
     * @return FlexFontSize
     */
    public static function sm()
    {
        return new static(static::SM);
    }

    /**
     * @return FlexFontSize
     */
    public static function md()
    {
        return new static(static::MD);
    }

    /**
     * @return FlexFontSize
     */
    public static function lg()
    {
        return new static(static::LG);
    }

    /**
     * @return FlexFontSize
     */
    public static function xl()
    {
        return new static(static::XL);
    }

    /**
     * @return FlexFontSize
     */
    public static function xxl()
    {
        return new static(static::XXL);
    }

    /**
     * @return FlexFontSize
     */
    public static function xxxl()
    {
        return new static(static::XXXL);
    }

    /**
     * @return FlexFontSize
     */
    public static function xxxxl()
    {
        return new static(static::XXXXL);
    }

    /**
     * @return FlexFontSize
     */
    public static function xxxxxl()
    {
        return new static(static::XXXXXL);
    }
}