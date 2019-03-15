<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:50
 */

namespace Conversation\ConversationMessage\Flex\Property;


class FlexImageAspectMode implements FlexPropertyInterface
{
    const MODE_COVER = 'cover';
    const MODE_FIT = 'fit';

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
     * @return FlexImageAspectMode
     */
    public static function cover()
    {
        return new static(static::MODE_COVER);
    }

    /**
     * @return FlexImageAspectMode
     */
    public static function fit()
    {
        return new static(static::MODE_FIT);
    }
}