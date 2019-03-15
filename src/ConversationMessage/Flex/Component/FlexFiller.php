<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:44
 */

namespace Conversation\ConversationMessage\Flex\Component;



class FlexFiller implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /**
     * Filler constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::FILLER);
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
}