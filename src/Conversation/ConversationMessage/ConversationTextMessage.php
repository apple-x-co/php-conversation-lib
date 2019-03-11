<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationMessage;

use Conversation\AbstractConversationMessage;
use Conversation\ConversationAction\ConversationQuickReplyAction;
use Conversation\ConversationMessageType;

class ConversationTextMessage extends AbstractConversationMessage
{
    /** @var null|string */
    private $text;

    /** @var ConversationQuickReplyAction[] */
    private $actions;

    /**
     * ConversationTextMessage constructor.
     *
     * @param string $text
     * @param ConversationQuickReplyAction[] $actions
     */
    public function __construct($text, $actions = [])
    {
        $this->text = $text;
        $this->actions = $actions;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::TEXT;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return array|ConversationQuickReplyAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }
}