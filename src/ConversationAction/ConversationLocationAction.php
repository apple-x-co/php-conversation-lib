<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/11
 * Time: 11:44
 */

namespace Conversation\ConversationAction;


use Conversation\AbstractConversationAction;
use Conversation\URL;
use Conversation\ConversationActionType;

class ConversationLocationAction extends AbstractConversationAction
{
    /** @var string */
    private $label;

    /**
     * ConversationCameraAction constructor.
     *
     * @param $label
     */
    public function __construct($label)
    {
        $this->label = $label;
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
    public function getType()
    {
        return ConversationActionType::LOCATION;
    }
}