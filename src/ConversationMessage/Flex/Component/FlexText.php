<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:35
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\AbstractConversationAction;
use Conversation\ConversationMessage\Flex\Property\FlexAlign;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexDecoration;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexFontStyle;
use Conversation\ConversationMessage\Flex\Property\FlexFontWeight;
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexPosition;

class FlexText implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var string */
    private $text;

    /** @var FlexSpan[] */
    private $contents;

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

    /** @var FlexFontSize */
    private $size;

    /** @var FlexAlign */
    private $align;

    /** @var FlexGravity */
    private $gravity;

    /** @var bool */
    private $wrap;

    /** @var int */
    private $maxLines;

    /** @var FlexFontWeight */
    private $weight;

    /** @var FlexColor */
    private $color;

    /** @var AbstractConversationAction */
    private $action;

    /** @var FlexFontStyle */
    private $style;

    /** @var FlexDecoration */
    private $decoration;

    /**
     * Text constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::TEXT);
        $this->contents = [];
        $this->position = new FlexPosition(FlexPosition::RELATIVE);
        $this->offsetTop = null;
        $this->offsetBottom = null;
        $this->offsetStart = null;
        $this->offsetEnd = null;
        $this->style = new FlexFontStyle(FlexFontStyle::NORMAL);
        $this->decoration = new FlexDecoration(FlexDecoration::NONE);
    }

    /**
     * @param string $text
     *
     * @return self
     */
    public static function text($text)
    {
        return (new self)->setText($text);
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
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return FlexSpan[]
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param FlexSpan $content
     *
     * @return self
     */
    public function addContent($content)
    {
        $this->contents[] = $content;

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
     * @return FlexFontSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param FlexFontSize $size
     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;
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
     * @return bool
     */
    public function isWrap()
    {
        return $this->wrap;
    }

    /**
     * @param bool $wrap
     *
     * @return self
     */
    public function setWrap($wrap)
    {
        $this->wrap = $wrap;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLines()
    {
        return $this->maxLines;
    }

    /**
     * @param $maxLines
     *
     * @return self
     */
    public function setMaxLines($maxLines)
    {
        $this->maxLines = $maxLines;
        return $this;
    }

    /**
     * @return FlexFontWeight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param FlexFontWeight $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return FlexColor
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param FlexColor $color
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;
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

    /**
     * @return FlexFontStyle
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param FlexFontStyle $style
     *
     * @return self
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @return FlexDecoration
     */
    public function getDecoration()
    {
        return $this->decoration;
    }

    /**
     * @param FlexDecoration $decoration
     *
     * @return self
     */
    public function setDecoration($decoration)
    {
        $this->decoration = $decoration;

        return $this;
    }
}