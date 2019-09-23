<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:41
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\AbstractConversationAction;
use Conversation\ConversationMessage\Flex\Property\FlexAlign;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectMode;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectRatio;
use Conversation\ConversationMessage\Flex\Property\FlexImageSize;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexPosition;
use Conversation\URL;

class FlexImage implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var URL */
    private $url;

    /** @var int */
    private $flex;

    /** @var FlexMargin */
    private $margin;

    /** @var FlexPosition */
    private $position;

    /** @var string */
    private $offsetTop;

    /** @var string */
    private $offsetBottom;

    /** @var string */
    private $offsetStart;

    /** @var string */
    private $offsetEnd;

    /** @var FlexAlign */
    private $align;

    /** @var FlexGravity */
    private $gravity;

    /** @var FlexImageSize */
    private $size;

    /** @var FlexImageAspectRatio */
    private $aspectRatio;

    /** @var FlexImageAspectMode */
    private $aspectMode;

    /** @var FlexColor */
    private $backgroundColor;

    /** @var AbstractConversationAction */
    private $action;

    /**
     * Image constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::IMAGE);
    }

    /**
     * @return FlexComponentType
     */
    public function getComponentType()
    {
        return $this->componentType;
    }

    /**
     * @param FlexComponentType $componentType
     *
     * @return self
     */
    public function setComponentType($componentType)
    {
        $this->componentType = $componentType;
        return $this;
    }

    /**
     * @return URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param URL $url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getFlex()
    {
        return $this->flex;
    }

    /**
     * @param int $flex
     *
     * @return self
     */
    public function setFlex($flex)
    {
        $this->flex = $flex;
        return $this;
    }

    /**
     * @return FlexMargin
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * @param FlexMargin $margin
     *
     * @return self
     */
    public function setMargin($margin)
    {
        $this->margin = $margin;
        return $this;
    }

    /**
     * @return FlexPosition
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param FlexPosition $position
     *
     * @return self
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return string
     */
    public function getOffsetTop()
    {
        return $this->offsetTop;
    }

    /**
     * @param string $offsetTop
     *
     * @return self
     */
    public function setOffsetTop($offsetTop)
    {
        $this->offsetTop = $offsetTop;

        return $this;
    }

    /**
     * @return string
     */
    public function getOffsetBottom()
    {
        return $this->offsetBottom;
    }

    /**
     * @param string $offsetBottom
     *
     * @return self
     */
    public function setOffsetBottom($offsetBottom)
    {
        $this->offsetBottom = $offsetBottom;

        return $this;
    }

    /**
     * @return string
     */
    public function getOffsetStart()
    {
        return $this->offsetStart;
    }

    /**
     * @param string $offsetStart
     *
     * @return self
     */
    public function setOffsetStart($offsetStart)
    {
        $this->offsetStart = $offsetStart;

        return $this;
    }

    /**
     * @return string
     */
    public function getOffsetEnd()
    {
        return $this->offsetEnd;
    }

    /**
     * @param string $offsetEnd
     *
     * @return self
     */
    public function setOffsetEnd($offsetEnd)
    {
        $this->offsetEnd = $offsetEnd;

        return $this;
    }

    /**
     * @return FlexAlign
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * @param FlexAlign $align
     *
     * @return self
     */
    public function setAlign($align)
    {
        $this->align = $align;
        return $this;
    }

    /**
     * @return FlexGravity
     */
    public function getGravity()
    {
        return $this->gravity;
    }

    /**
     * @param FlexGravity $gravity
     *
     * @return self
     */
    public function setGravity($gravity)
    {
        $this->gravity = $gravity;
        return $this;
    }

    /**
     * @return FlexImageSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param FlexImageSize $size
     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return FlexImageAspectRatio
     */
    public function getAspectRatio()
    {
        return $this->aspectRatio;
    }

    /**
     * @param FlexImageAspectRatio $aspectRatio
     *
     * @return self
     */
    public function setAspectRatio($aspectRatio)
    {
        $this->aspectRatio = $aspectRatio;
        return $this;
    }

    /**
     * @return FlexImageAspectMode
     */
    public function getAspectMode()
    {
        return $this->aspectMode;
    }

    /**
     * @param FlexImageAspectMode $aspectMode
     *
     * @return self
     */
    public function setAspectMode($aspectMode)
    {
        $this->aspectMode = $aspectMode;
        return $this;
    }

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
     * @return self
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
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
     *
     * @return self
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }
}