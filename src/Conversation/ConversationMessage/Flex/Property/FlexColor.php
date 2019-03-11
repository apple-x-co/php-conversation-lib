<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexColor implements FlexPropertyInterface
{
    /** @var string */
    private $type;

    /**
     * FlexColor constructor.
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
     * @param string $hex
     *
     * @return FlexColor
     */
    public static function hex($hex)
    {
        return new static($hex);
    }
}
