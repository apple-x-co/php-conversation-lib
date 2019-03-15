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
use Conversation\ConversationMessageType;
use Conversation\Exception\ConversationMessage\ConversationConfirmMessageMissingArgumentException;

class ConversationConfirmMessage extends AbstractConversationMessage
{
    /** @var string */
    private $title;

    /** @var string */
    private $message;

    /** @var AbstractConversationAction[] */
    private $actions;

    const ACTIONS_LIMIT = 2;

    /**
     * ConversationConfirmMessage constructor.
     *
     * @param string $title
     * @param string $message
     * @param AbstractConversationAction[] $actions
     */
    public function __construct($title, $message, $actions)
    {
        if (count($actions) !== $this::ACTIONS_LIMIT) {
            throw new ConversationConfirmMessageMissingArgumentException();
        }

        $this->title   = $title;
        $this->message = $message;
        $this->actions = $actions;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::CONFIRM;
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
     * @return AbstractConversationAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }
}