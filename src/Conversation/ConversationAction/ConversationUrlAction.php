<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/11
 * Time: 11:44
 */

namespace Conversation\ConversationAction;


use Conversation\AbstractConversationAction;
use Conversation\URI;
use Conversation\ConversationActionType;

class ConversationUrlAction extends AbstractConversationAction
{
    /** @var string */
    private $label;

    /** @var URI */
    private $url;

    /**
     * ConversationUrlAction constructor.
     *
     * @param string $label
     * @param URI $url
     */
    public function __construct($label, $url)
    {
        $this->label = $label;
        $this->url   = $url;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationActionType::URL;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return URI
     */
    public function getUrl()
    {
        return $this->url;
    }
}
