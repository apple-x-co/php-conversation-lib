<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/04
 * Time: 8:06
 */

namespace Conversation\ConversationMessage;


use Conversation\AbstractConversationMessage;
use Conversation\ConversationAction\ConversationQuickReplyAction;
use Conversation\ConversationMessage\Flex\Container\FlexContainerInterface;
use Conversation\ConversationMessageType;

/**
 * Class ConversationFlexMessage
 *
 * @package Conversation\ConversationMessage
 *
 * @see https://github.com/line/line-bot-sdk-java/tree/master/line-bot-model/src/main/java/com/linecorp/bot/model/message/flex
 */
class ConversationFlexMessage extends AbstractConversationMessage
{
    private $altText;

    /** @var FlexContainerInterface */
    private $flexContainer;

    /** @var ConversationQuickReplyAction[] */
    private $actions;

    /**
     * ConversationFlexMessage constructor.
     *
     * @param string $altText
     * @param FlexContainerInterface $flexContainer
     * @param ConversationQuickReplyAction[] $actions
     */
    public function __construct($altText, $flexContainer, $actions = [])
    {
        $this->altText = $altText;
        $this->flexContainer = $flexContainer;
        $this->actions = $actions;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::FLEX;
    }

    /**
     * @return string
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * @return FlexContainerInterface
     */
    public function getContainer()
    {
        return $this->flexContainer;
    }

    /**
     * @return array|ConversationQuickReplyAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }
}