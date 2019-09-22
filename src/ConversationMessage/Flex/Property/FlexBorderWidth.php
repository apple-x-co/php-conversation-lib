<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:19
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexBorderWidth implements FlexPropertyInterface
{
    const NONE = 'none';
    const LIGHT = 'light';
    const NORMAL = 'normal';
    const MEDIUM = 'medium';
    const SEMI_BOLD = 'semi-bold';
    const BOLD = 'bold';

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
     * @return FlexBorderWidth
     */
    public static function none()
    {
        return new self(self::NONE);
    }

    /**
     * @return FlexBorderWidth
     */
    public static function light()
    {
        return new self(self::LIGHT);
    }

    /**
     * @return FlexBorderWidth
     */
    public static function normal()
    {
        return new self(self::NORMAL);
    }

    /**
     * @return FlexBorderWidth
     */
    public static function medium()
    {
        return new self(self::MEDIUM);
    }

    /**
     * @return FlexBorderWidth
     */
    public static function semi_bold()
    {
        return new self(self::SEMI_BOLD);
    }

    /**
     * @return FlexBorderWidth
     */
    public static function bold()
    {
        return new self(self::BOLD);
    }
}