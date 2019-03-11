<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:44
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\AbstractConversationAction;
use Conversation\ConversationMessage\Flex\Property\FlexLayout;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;

class FlexBox implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var FlexLayout */
    private $layout;

    /** @var FlexComponentInterface[] */
    private $contents;

    /** @var int */
    private $flex;

    /** @var FlexSpacing */
    private $spacing;

    /** @var FlexMargin */
    private $margin;

    /** @var AbstractConversationAction */
    private $action;

    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::BOX);
        $this->layout = new FlexLayout(FlexLayout::HORIZONTAL);
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
     * @param FlexComponentInterface $content
     *
     * @return self
     */
    public function addContent($content)
    {
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
