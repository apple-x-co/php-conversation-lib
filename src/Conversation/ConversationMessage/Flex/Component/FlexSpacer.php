<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:45
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\ConversationMessage\Flex\Property\FlexSpacerSize;

class FlexSpacer implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var FlexSpacerSize */
    private $size;

    /**
     * Spacer constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::SPACER);
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
     * @return FlexSpacerSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param FlexSpacerSize $size
     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
}