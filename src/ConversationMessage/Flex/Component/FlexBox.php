<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:44
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\AbstractConversationAction;
use Conversation\ConversationMessage\Flex\Property\FlexBorderWidth;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexLayout;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexPosition;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;

class FlexBox implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var FlexLayout */
    private $layout;

    /** @var FlexColor */
    private $backgroundColor;

    /** @var FlexColor */
    private $borderColor;

    /** @var FlexBorderWidth */
    private $borderWidth;

    /** @var string */
    private $cornerRadius;

    /** @var string */
    private $width;

    /** @var string */
    private $height;

    /** @var FlexComponentInterface[] */
    private $contents;

    /** @var int */
    private $flex;

    /** @var FlexSpacing */
    private $spacing;

    /** @var FlexMargin */
    private $margin;

    /** @var string */
    private $paddingAll;

    /** @var string */
    private $paddingTop;

    /** @var string */
    private $paddingBottom;

    /** @var string */
    private $paddingStart;

    /** @var string */
    private $paddingEnd;

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

    /** @var AbstractConversationAction */
    private $action;

    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::BOX);
        $this->layout = new FlexLayout(FlexLayout::HORIZONTAL);
        $this->backgroundColor = new FlexColor('#00000000');
        $this->borderColor = new FlexColor('#00000000');
        $this->borderWidth = new FlexBorderWidth(FlexBorderWidth::NORMAL);
        $this->cornerRadius = 'none';
        $this->width = null;
        $this->height = null;
        $this->paddingAll = null;
        $this->paddingTop = null;
        $this->paddingBottom = null;
        $this->paddingStart = null;
        $this->paddingEnd = null;
        $this->position = new FlexPosition(FlexPosition::RELATIVE);
        $this->offsetTop = null;
        $this->offsetBottom = null;
        $this->offsetStart = null;
        $this->offsetEnd = null;
    }

    /**
     * @return self
     */
    public static function horizontal()
    {
        return new self();
    }

    /**
     * @return self
     */
    public static function vertical()
    {
        return (new self())->setLayout(new FlexLayout(FlexLayout::VERTICAL));
    }

    /**
     * @return self
     */
    public static function baseline()
    {
        return (new self())->setLayout(new FlexLayout(FlexLayout::BASELINE));
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
     */
    public function setComponentType($componentType)
    {
        $this->componentType = $componentType;
    }

    /**
     * @return FlexLayout
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param FlexLayout $layout
     *
     * @return self
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * @return FlexComponentInterface[]
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param FlexComponentInterface|callable $content
     *
     * @return self
     */
    public function addContent($content)
    {
        if (is_callable($content)) {
            $content = $content();
        }

        if (is_null($content) ||
            empty($content) ||
            ! is_subclass_of($content, '\Conversation\ConversationMessage\Flex\Component\FlexComponentInterface')) {
            return $this;
        }

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
     * @return FlexSpacing
     */
    public function getSpacing()
    {
        return $this->spacing;
    }

    /**
     * @param FlexSpacing $spacing
     *
     * @return self
     */
    public function setSpacing($spacing)
    {
        $this->spacing = $spacing;

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
     * @return FlexColor
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * @param FlexColor $borderColor
     *
     * @return self
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    /**
     * @return FlexBorderWidth
     */
    public function getBorderWidth()
    {
        return $this->borderWidth;
    }

    /**
     * @param FlexBorderWidth $borderWidth
     *
     * @return self
     */
    public function setBorderWidth($borderWidth)
    {
        $this->borderWidth = $borderWidth;

        return $this;
    }

    /**
     * @return string
     */
    public function getCornerRadius()
    {
        return $this->cornerRadius;
    }

    /**
     * @param string $cornerRadius
     *
     * @return self
     */
    public function setCornerRadius($cornerRadius)
    {
        $this->cornerRadius = $cornerRadius;

        return $this;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaddingAll()
    {
        return $this->paddingAll;
    }

    /**
     * @param string $paddingAll
     *
     * @return self
     */
    public function setPaddingAll($paddingAll)
    {
        $this->paddingAll = $paddingAll;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaddingTop()
    {
        return $this->paddingTop;
    }

    /**
     * @param string $paddingTop
     *
     * @return self
     */
    public function setPaddingTop($paddingTop)
    {
        $this->paddingTop = $paddingTop;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaddingBottom()
    {
        return $this->paddingBottom;
    }

    /**
     * @param string $paddingBottom
     *
     * @return self
     */
    public function setPaddingBottom($paddingBottom)
    {
        $this->paddingBottom = $paddingBottom;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaddingStart()
    {
        return $this->paddingStart;
    }

    /**
     * @param string $paddingStart
     *
     * @return self
     */
    public function setPaddingStart($paddingStart)
    {
        $this->paddingStart = $paddingStart;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaddingEnd()
    {
        return $this->paddingEnd;
    }

    /**
     * @param string $paddingEnd
     *
     * @return self
     */
    public function setPaddingEnd($paddingEnd)
    {
        $this->paddingEnd = $paddingEnd;

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
