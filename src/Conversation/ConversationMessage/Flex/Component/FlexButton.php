<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:45
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\AbstractConversationAction;
use Conversation\ConversationMessage\Flex\Property\FlexButtonHeight;
use Conversation\ConversationMessage\Flex\Property\FlexButtonStyle;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;

class FlexButton implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var AbstractConversationAction */
    private $action;

    /** @var int */
    private $flex;

    /** @var FlexMargin */
    private $margin;

    /** @var FlexButtonHeight */
    private $height;

    /** @var FlexButtonStyle */
    private $style;

    /** @var FlexColor */
    private $color;

    /** @var FlexGravity */
    private $gravity;

    /**
     * Button constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::BUTTON);
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
     * @return FlexButtonHeight
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param FlexButtonHeight $height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return FlexButtonStyle
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param FlexButtonStyle $style
     *
     * @return self
     */
    public function setStyle($style)
    {
        $this->style = $style;
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
}