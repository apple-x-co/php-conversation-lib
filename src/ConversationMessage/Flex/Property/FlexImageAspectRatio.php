<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:50
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexImageAspectRatio implements FlexPropertyInterface
{
    const ASPECT_1TO1 = '1:1';
    const ASPECT_151TO1 = '1.51:1';
    const ASPECT_191TO1 = '1.91:1';
    const ASPECT_4TO3 = '4:3';
    const ASPECT_16TO9 = '16:9';
    const ASPECT_20TO13 = '20:13';
    const ASPECT_2TO1 = '2:1';
    const ASPECT_3TO1 = '3:1';
    const ASPECT_3TO4 = '3:4';
    const ASPECT_9TO16 = '9:16';
    const ASPECT_1TO2 = '1:2';
    const ASPECT_2TO3 = '2:3';

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
     * @return FlexImageAspectRatio
     */
    public static function one2one()
    {
        return new static(static::ASPECT_1TO1);
    }
}