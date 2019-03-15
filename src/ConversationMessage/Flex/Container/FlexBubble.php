<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/04
 * Time: 8:17
 */

namespace Conversation\ConversationMessage\Flex\Container;


use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexImage;
use Conversation\ConversationMessage\Flex\Property\FlexBubbleDirection;

class FlexBubble implements FlexContainerInterface
{
    /** @var FlexContainerType */
    private $type;

    /** @var FlexBubbleDirection */
    private $direction;

    /** @var FlexBox */
    private $header;

    /** @var FlexImage */
    private $hero;

    /** @var FlexBox */
    private $body;

    /** @var FlexBox */
    private $footer;

    /** @var FlexBubbleStyle */
    private $styles;

    public function __construct()
    {
        $this->type = new FlexContainerType(FlexContainerType::BUBBLE);
        $this->direction = new FlexBubbleDirection(FlexBubbleDirection::LTR);
        $this->header = null;
        $this->hero = null;
        $this->body = null;
        $this->footer = null;
        $this->styles = null;
    }

    /**
     * @return FlexContainerType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return FlexBubbleDirection
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param FlexBubbleDirection $direction
     *
     * @return self
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * @return FlexBox
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param FlexBox $header
     *
     * @return self
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return FlexImage
     */
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * @param FlexImage $hero
     *
     * @return self
     */
    public function setHero($hero)
    {
        $this->hero = $hero;
        return $this;
    }

    /**
     * @return FlexBox
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param FlexBox $body
     *
     * @return self
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return FlexBox
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param FlexBox $footer
     *
     * @return self
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return FlexBubbleStyle
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * @param FlexBubbleStyle $styles
     *
     * @return self
     */
    public function setStyles($styles)
    {
        $this->styles = $styles;
        return $this;
    }
}