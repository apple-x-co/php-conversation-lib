<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/09/18
 * Time: 8:47
 */

namespace Conversation\ConversationMenu;


class ConversationMenuSize
{
    /** @var int */
    private $width;

    /** @var int */
    private $height;

    /**
     * ConversationMenuBounds constructor.
     *
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}
