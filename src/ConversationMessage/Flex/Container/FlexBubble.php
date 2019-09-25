<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/04
 * Time: 8:17
 */

namespace Conversation\ConversationMessage\Flex\Container;


use Conversation\AbstractConversationAction;
use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexImage;
use Conversation\ConversationMessage\Flex\Property\FlexBubbleDirection;
use Conversation\ConversationMessage\Flex\Property\FlexBubbleSize;

class FlexBubble implements FlexContainerInterface
{
    /** @var FlexContainerType */
    private $type;

    /** @var FlexBubbleSize */
    private $size;

    /** @var FlexBubbleDirection */
    private $direction;

    /** @var FlexBox */
    private $header;

    /** @var FlexImage|FlexBox */
    private $hero;

    /** @var FlexBox */
    private $body;

    /** @var FlexBox */
    private $footer;

    /** @var FlexBubbleStyle */
    private $styles;

    /** @var AbstractConversationAction */
    private $action;

    public function __construct()
    {
        $this->type = new FlexContainerType(FlexContainerType::BUBBLE);
        $this->size = new FlexBubbleSize(FlexBubbleSize::MEGA);
        $this->direction = new FlexBubbleDirection(FlexBubbleDirection::LTR);
        $this->header = null;
        $this->hero = null;
        $this->body = null;
        $this->footer = null;
        $this->styles = null;
        $this->action = null;
    }

    /**
     * @return self
     */
    public static function nano()
    {
        return (new self)->setSize(new FlexBubbleSize(FlexBubbleSize::NANO));
    }

    /**
     * @return self
     */
    public static function micro()
    {
        return (new self)->setSize(new FlexBubbleSize(FlexBubbleSize::MICRO));
    }

    /**
     * @return self
     */
    public static function kilo()
    {
        return (new self)->setSize(new FlexBubbleSize(FlexBubbleSize::KILO));
    }

    /**
     * @return self
     */
    public static function mega()
    {
        return (new self)->setSize(new FlexBubbleSize(FlexBubbleSize::MEGA));
    }

    /**
     * @return self
     */
    public static function giga()
    {
        return (new self)->setSize(new FlexBubbleSize(FlexBubbleSize::GIGA));
    }

    /**
     * @return FlexContainerType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return FlexBubbleSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param FlexBubbleSize $size
     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
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
     * @return FlexImage|FlexBox
     */
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * @param FlexImage|FlexBox $hero
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

    /**
     * @return AbstractConversationAction
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param AbstractConversationAction $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
}