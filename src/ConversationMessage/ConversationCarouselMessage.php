<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationMessage;

use Conversation\AbstractConversationAction;
use Conversation\AbstractConversationMessage;
use Conversation\Exception\ConversationMessage\ConversationCarouselMessageMissingArgumentException;
use Conversation\URL;
use Conversation\ConversationMessageType;

class ConversationCarouselMessage extends AbstractConversationMessage
{
    /** @var string */
    private $title;

    /** @var ConversationCarouselMessageColumn[] */
    private $columns;

    const COLUMNS_LIMIT = 10;

    /**
     * ConversationCarouselMessage constructor.
     *
     * @param ConversationCarouselMessageColumn[] $columns
     */
    public function __construct($title, $columns)
    {
        if (count($columns) > $this::COLUMNS_LIMIT) {
            throw new ConversationCarouselMessageMissingArgumentException();
        }

        $this->title   = $title;
        $this->columns = $columns;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::CAROUSEL;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return ConversationCarouselMessageColumn[]
     */
    public function getColumns()
    {
        return $this->columns;
    }
}

class ConversationCarouselMessageColumn
{
    /** @var string */
    private $title;

    /** @var  string */
    private $message;

    /** @var URL */
    private $imageUrl;

    /** @var AbstractConversationAction[] */
    private $actions;

    const ACTIONS_LIMIT = 3;

    /**
     * ConversationCarouselMessageColumn constructor.
     *
     * @param string $title
     * @param string $message
     * @param URL|null $imageUrl
     * @param AbstractConversationAction[] $actions
     */
    public function __construct($title, $message, $imageUrl, $actions)
    {
        if (count($actions) > $this::ACTIONS_LIMIT) {
            throw new ConversationCarouselMessageMissingArgumentException();
        }

        $this->title    = $title;
        $this->message  = $message;
        $this->imageUrl = $imageUrl;
        $this->actions  = $actions;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return URL
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @return AbstractConversationAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }
}