<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexFontStyle implements FlexPropertyInterface
{
    const NORMAL = 'normal';
    const ITALIC = 'italic';

    /** @var string */
    private $type;

    /**
     * FlexFontWeight constructor.
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
     * @return FlexFontStyle
     */
    public static function normal()
    {
        return new static(static::NORMAL);
    }

    /**
     * @return FlexFontStyle
     */
    public static function talic()
    {
        return new static(static::ITALIC);
    }
}