<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexPosition implements FlexPropertyInterface
{
    const RELATIVE = 'relative';
    const ABSOLUTE = 'absolute';

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
     * @return FlexPosition
     */
    public static function relative()
    {
        return new static(static::RELATIVE);
    }

    /**
     * @return FlexPosition
     */
    public static function absolute()
    {
        return new static(static::ABSOLUTE);
    }
}