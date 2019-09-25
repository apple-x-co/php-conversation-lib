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
     * @return self
     */
    public static function xs()
    {
        return (new self())->setSize(FlexSpacerSize::xs());
    }

    /**
     * @return self
     */
    public static function sm()
    {
        return (new self())->setSize(FlexSpacerSize::sm());
    }

    /**
     * @return self
     */
    public static function md()
    {
        return (new self())->setSize(FlexSpacerSize::md());
    }


    /**
     * @return self
     */
    public static function lg()
    {
        return (new self())->setSize(FlexSpacerSize::lg());
    }

    /**
     * @return self
     */
    public static function xl()
    {
        return (new self())->setSize(FlexSpacerSize::xl());
    }

    /**
     * @return self
     */
    public static function xxl()
    {
        return (new self())->setSize(FlexSpacerSize::xxl());
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