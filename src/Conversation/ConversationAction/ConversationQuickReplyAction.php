<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/02
 * Time: 14:53
 */

namespace Conversation\ConversationAction;


use Conversation\AbstractConversationAction;
use Conversation\ConversationActionType;
use Conversation\URL;

class ConversationQuickReplyAction extends AbstractConversationAction
{
    /** @var URL */
    private $url;

    /** @var AbstractConversationAction */
    private $action;

    /**
     * ConversationQuickReplyAction constructor.
     *
     * @param URL|null $url
     * @param AbstractConversationAction $action
     */
    public function __construct($url, $action)
    {
        $this->url = $url;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationActionType::ACTION;
    }

    /**
     * @return URL|null
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * @return AbstractConversationAction
     */
    public function getAction()
    {
        return $this->action;
    }
}