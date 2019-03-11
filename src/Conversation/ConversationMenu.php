<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/09/18
 * Time: 8:47
 */

namespace Conversation;


use Conversation\ConversationMenu\ConversationMenuArea;
use Conversation\ConversationMenu\ConversationMenuSize;

class ConversationMenu
{
    /** @var ConversationMenuSize */
    private $size;

    /** @var bool */
    private $default;

    /** @var string */
    private $name;

    /** @var string */
    private $label;

    /** @var ConversationMenuArea[] */
    private $areas;

    /**
     * ConversationMenu constructor.
     *
     * @param ConversationMenuSize $size
     * @param bool $default
     * @param string $name
     * @param string $label
     * @param ConversationMenuArea[] $areas
     */
    public function __construct($size, $default, $name, $label, $areas)
    {
        $this->size    = $size;
        $this->default = $default;
        $this->name    = $name;
        $this->label   = $label;
        $this->areas   = $areas;
    }

    /**
     * @return ConversationMenuSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return bool
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return ConversationMenuArea[]
     */
    public function getAreas()
    {
        return $this->areas;
    }
}
