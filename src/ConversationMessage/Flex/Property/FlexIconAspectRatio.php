<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:50
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexIconAspectRatio implements FlexPropertyInterface
{
    const ASPECT_1TO1 = '1:1';
    const ASPECT_2TO1 = '2:1';
    const ASPECT_3TO1 = '3:1';

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
     * @return FlexIconAspectRatio
     */
    public static function one2one()
    {
        return new static(static::ASPECT_1TO1);
    }

    /**
     * @return FlexIconAspectRatio
     */
    public static function two2one()
    {
        return new static(static::ASPECT_2TO1);
    }

    /**
     * @return FlexIconAspectRatio
     */
    public static function three2one()
    {
        return new static(static::ASPECT_3TO1);
    }
}