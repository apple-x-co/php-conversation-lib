<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexDirection implements FlexPropertyInterface
{
    const LTR = 'ltr';
    const RTL = 'rtl';

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
     * @return FlexDirection
     */
    public static function ltr()
    {
        return new static(static::LTR);
    }

    /**
     * @return FlexDirection
     */
    public static function rtl()
    {
        return new static(static::RTL);
    }
}