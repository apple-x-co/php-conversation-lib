<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:20
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexSpacing implements FlexPropertyInterface
{
    const NONE = 'none';
    const XS = 'xs';
    const SM = 'sm';
    const MD = 'md';
    const LG = 'lg';
    const XL = 'xl';
    const XXL = 'xxl';

    /** @var string */
    private $type;

    /**
     * FlexSpacing constructor.
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
     * @return FlexSpacing
     */
    public static function none()
    {
        return new static(static::NONE);
    }

    /**
     * @return FlexSpacing
     */
    public static function xs()
    {
        return new static(static::XS);
    }

    /**
     * @return FlexSpacing
     */
    public static function sm()
    {
        return new static(static::SM);
    }

    /**
     * @return FlexSpacing
     */
    public static function md()
    {
        return new static(static::MD);
    }

    /**
     * @return FlexSpacing
     */
    public static function lg()
    {
        return new static(static::LG);
    }

    /**
     * @return FlexSpacing
     */
    public static function xl()
    {
        return new static(static::XL);
    }

    /**
     * @return FlexSpacing
     */
    public static function xxl()
    {
        return new static(static::XXL);
    }
}