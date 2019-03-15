<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexButtonStyle implements FlexPropertyInterface
{
    const LINK = 'link';
    const PRIMARY = 'primary';
    const SECONDARY = 'secondary';

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
     * @return FlexButtonStyle
     */
    public static function link()
    {
        return new static(static::LINK);
    }

    /**
     * @return FlexButtonStyle
     */
    public static function primary()
    {
        return new static(static::PRIMARY);
    }

    /**
     * @return FlexButtonStyle
     */
    public static function secondary()
    {
        return new static(static::SECONDARY);
    }
}