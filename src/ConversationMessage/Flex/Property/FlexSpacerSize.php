<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:20
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexSpacerSize implements FlexPropertyInterface
{
    const XS = 'xs';
    const SM = 'sm';
    const MD = 'md';
    const LG = 'lg';
    const XL = 'xl';
    const XXL = 'xxl';

    /** @var string */
    private $type;

    /**
     * FlexMarginSize constructor.
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
     * @return FlexSpacerSize
     */
    public static function xs()
    {
        return new static(static::XS);
    }

    /**
     * @return FlexSpacerSize
     */
    public static function sm()
    {
        return new static(static::SM);
    }

    /**
     * @return FlexSpacerSize
     */
    public static function md()
    {
        return new static(static::MD);
    }

    /**
     * @return FlexSpacerSize
     */
    public static function lg()
    {
        return new static(static::LG);
    }

    /**
     * @return FlexSpacerSize
     */
    public static function xl()
    {
        return new static(static::XL);
    }

    /**
     * @return FlexSpacerSize
     */
    public static function xxl()
    {
        return new static(static::XXL);
    }
}