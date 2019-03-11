<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/11
 * Time: 11:44
 */

namespace Conversation\ConversationAction;


use Conversation\AbstractConversationAction;
use Conversation\ConversationActionType;
use Conversation\ConversationMessage\ConversationImageMapMessageArea;

class ConversationImageMapMessageAction extends AbstractConversationAction
{
    /** @var string */
    private $text;

    /** @var ConversationImageMapMessageArea  */
    private $area;

    /**
     * ConversationImageMapMessageAction constructor.
     *
     * @param string $text
     * @param ConversationImageMapMessageArea $area
     */
    public function __construct($text, $area)
    {
        $this->text = $text;
        $this->area = $area;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationActionType::MESSAGE;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return ConversationImageMapMessageArea
     */
    public function getArea()
    {
        return $this->area;
    }
}