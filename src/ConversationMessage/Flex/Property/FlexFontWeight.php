<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexFontWeight implements FlexPropertyInterface
{
    const REGULAR = 'regular';
    const BOLD = 'bold';

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
     * @return FlexFontWeight
     */
    public static function regular()
    {
        return new static(static::REGULAR);
    }

    /**
     * @return FlexFontWeight
     */
    public static function bold()
    {
        return new static(static::BOLD);
    }
}