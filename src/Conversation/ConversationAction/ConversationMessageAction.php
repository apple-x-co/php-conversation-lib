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

class ConversationMessageAction extends AbstractConversationAction
{
    /** @var string */
    private $label;

    /** @var string|null */
    private $text;

    /**
     * ConversationPostbackAction constructor.
     *
     * @param $label
     * @param null $text
     */
    public function __construct($label, $text = null)
    {
        $this->label = $label;
        $this->text  = $text;
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }
}