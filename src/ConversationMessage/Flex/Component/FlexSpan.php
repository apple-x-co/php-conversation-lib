<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/08
 * Time: 18:35
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexDecoration;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexFontStyle;
use Conversation\ConversationMessage\Flex\Property\FlexFontWeight;

class FlexSpan implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var string */
    private $text;

    /** @var FlexColor */
    private $color;

    /** @var FlexFontSize */
    private $size;

    /** @var FlexFontWeight */
    private $weight;

    /** @var FlexFontStyle */
    private $style;

    /** @var FlexDecoration */
    private $decoration;

    /**
     * Text constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::SPAN);
        $this->text = '';
        $this->color = FlexColor::hex('#000000');
        $this->size = FlexFontSize::md();
        $this->weight = FlexFontWeight::regular();
        $this->style = FlexFontStyle::normal();
        $this->decoration = FlexDecoration::none();
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
     * @return FlexSpan
     */
    public function setText($text)
    {
        $this->text = $text;

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
     * @return FlexSpan
     */
    public function setColor($color)
    {
        $this->color = $color;

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
     * @return FlexSpan
     */
    public function setSize($size)
    {
        $this->size = $size;

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
     * @return FlexSpan
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

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
     * @return FlexSpan
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
     * @return FlexSpan
     */
    public function setDecoration($decoration)
    {
        $this->decoration = $decoration;

        return $this;
    }
}