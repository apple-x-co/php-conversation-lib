<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:20
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexGravity implements FlexPropertyInterface
{
    const TOP = 'top';
    const BOTTOM = 'bottom';
    const CENTER = 'center';

    /** @var string */
    private $type;

    /**
     * FlexGravity constructor.
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
     * @return FlexGravity
     */
    public static function top()
    {
        return new static(static::TOP);
    }

    /**
     * @return FlexGravity
     */
    public static function bottom()
    {
        return new static(static::BOTTOM);
    }

    /**
     * @return FlexGravity
     */
    public static function center()
    {
        return new static(static::CENTER);
    }
}