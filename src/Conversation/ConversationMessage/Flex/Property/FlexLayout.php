<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:20
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexLayout implements FlexPropertyInterface
{
    const HORIZONTAL = 'horizontal';
    const VERTICAL = 'vertical';
    const BASELINE = 'baseline';

    /** @var string */
    private $type;

    /**
     * FlexLayout constructor.
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
     * @return FlexLayout
     */
    public static function horizontal()
    {
        return new static(static::HORIZONTAL);
    }

    /**
     * @return FlexLayout
     */
    public static function vertical()
    {
        return new static(static::VERTICAL);
    }

    /**
     * @return FlexLayout
     */
    public static function baseline()
    {
        return new static(static::BASELINE);
    }
}