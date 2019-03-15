<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/09/18
 * Time: 8:47
 */

namespace Conversation\ConversationMenu;


class ConversationMenuBounds
{
    /** @var int */
    private $x;

    /** @var int */
    private $y;

    /** @var int */
    private $width;

    /** @var int */
    private $height;

    /**
     * ConversationMenuBounds constructor.
     *
     * @param $x
     * @param $y
     * @param $width
     * @param $height
     */
    public function __construct($x, $y, $width, $height)
    {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
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
