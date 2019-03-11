<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:44
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;

class FlexSeparator implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var FlexMargin */
    private $margin;

    /** @var FlexColor */
    private $color;

    /**
     * Separator constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::SEPARATOR);
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


}