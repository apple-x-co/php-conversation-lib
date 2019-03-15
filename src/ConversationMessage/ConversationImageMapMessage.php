<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationMessage;

use Conversation\AbstractConversationMessage;
use Conversation\ConversationAction\ConversationImageMapMessageAction;
use Conversation\ConversationMessageType;
use Conversation\Exception\ConversationMessage\ConversationImageMapMessageMissingArgumentException;
use Conversation\URL;

class ConversationImageMapMessage extends AbstractConversationMessage
{
    /** @var URL */
    private $imageUrl;

    /** @var string */
    private $title;

    /** @var ConversationImageMapMessageSize */
    private $size;

    /** @var ConversationImageMapMessageAction[] */
    private $actions;

    /**
     * ConversationImageMessage constructor.
     *
     * @param URL $imageUrl
     * @param string $title
     * @param ConversationImageMapMessageSize $size
     * @param ConversationImageMapMessageAction[] $actions
     */
    public function __construct($imageUrl, $title, $size, $actions)
    {
        if ( ! ($imageUrl instanceof URL)) {
            throw new ConversationImageMapMessageMissingArgumentException();
        }

        $this->imageUrl = $imageUrl;
        $this->title    = $title;
        $this->size     = $size;
        $this->actions  = $actions;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::IMAGE_MAP;
    }

    /**
     * @return URL
     */
    public function getImageURL()
    {
        return $this->imageUrl;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return ConversationImageMapMessageSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return ConversationImageMapMessageAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }
}

class ConversationImageMapMessageSize
{
    /** @var int */
    private $width;

    /** @var int */
    private $height;

    /**
     * ConversationImageMapMessageSize constructor.
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

class ConversationImageMapMessageArea
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
     * ConversationImageMapMessageArea constructor.
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
    public function getWidht()
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