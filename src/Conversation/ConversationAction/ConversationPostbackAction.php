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

class ConversationPostbackAction extends AbstractConversationAction
{
    /** @var string */
    private $label;

    /** @var string */
    private $data;

    /** @var string|null */
    private $text;

    /**
     * ConversationPostbackAction constructor.
     *
     * @param $label
     * @param $data
     * @param null $text
     */
    public function __construct($label, $data, $text = null)
    {
        $this->label = $label;
        $this->data  = $data;
        $this->text  = $text;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationActionType::POSTBACK;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }
}