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
use Conversation\Exception\ConversationMessage\ConversationImageCarouselMessageMissingArgumentException;
use Conversation\URL;
use Conversation\ConversationMessageType;

class ConversationImageCarouselMessage extends AbstractConversationMessage
{
    /** @var ConversationImageCarouselMessageColumn[] */
    private $columns;

    const COLUMNS_LIMIT = 10;

    /**
     * ConversationImageCarouselMessage constructor.
     *
     * @param ConversationImageCarouselMessageColumn[] $columns
     */
    public function __construct($columns)
    {
        if (count($columns) > $this::COLUMNS_LIMIT) {
            throw new ConversationImageCarouselMessageMissingArgumentException();
        }

        $this->columns = $columns;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::IMAGE_CAROUSEL;
    }

    /**
     * @return ConversationImageCarouselMessageColumn[]
     */
    public function getColumns()
    {
        return $this->columns;
    }
}

class ConversationImageCarouselMessageColumn
{
    /** @var URL */
    private $imageUrl;

    /** @var AbstractConversationAction */
    private $action;

    /**
     * ConversationImageCarouselMessageColumn constructor.
     *
     * @param URL|null $imageUrl
     * @param AbstractConversationAction $action
     */
    public function __construct($imageUrl, $action)
    {
        $this->imageUrl = $imageUrl;
        $this->action   = $action;
    }

    /**
     * @return URL
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @return AbstractConversationAction
     */
    public function getAction()
    {
        return $this->action;
    }
}