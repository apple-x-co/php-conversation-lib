<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 9:59
 */

namespace Conversation\ConversationMessage\Flex\Container;


use Conversation\ConversationMessage\Flex\Property\FlexColor;

class FlexBlockStyle
{
    /** @var FlexColor */
    private $backgroundColor;

    /** @var bool */
    private $separator;

    /** @var FlexColor */
    private $separatorColor;

    /**
     * @return FlexColor
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param FlexColor $backgroundColor
     *
     * @return  self
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSeparator()
    {
        return $this->separator;
    }

    /**
     * @param bool $separator
     *
     * @return  self
     */
    public function setSeparator($separator)
    {
        $this->separator = $separator;

        return $this;
    }

    /**
     * @return FlexColor
     */
    public function getSeparatorColor()
    {
        return $this->separatorColor;
    }

    /**
     * @param FlexColor $separatorColor
     *
     * @return  self
     */
    public function setSeparatorColor($separatorColor)
    {
        $this->separatorColor = $separatorColor;

        return $this;
    }
}