<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexAlign implements FlexPropertyInterface
{
    const START = 'start';
    const END = 'end';
    const CENTER = 'center';

    /** @var string */
    private $type;

    /**
     * FlexAlign constructor.
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
     * @return FlexAlign
     */
    public static function start()
    {
        return new static(static::START);
    }

    /**
     * @return FlexAlign
     */
    public static function end()
    {
        return new static(static::END);
    }

    /**
     * @return FlexAlign
     */
    public static function center()
    {
        return new static(static::CENTER);
    }
}