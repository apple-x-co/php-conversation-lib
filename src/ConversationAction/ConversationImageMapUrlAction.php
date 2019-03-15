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
use Conversation\URL;

class ConversationImageMapUrlAction extends AbstractConversationAction
{
    /** @var URL */
    private $url;

    /** @var ConversationImageMapMessageArea  */
    private $area;

    /**
     * ConversationImageMapUrlAction constructor.
     *
     * @param URL $url
     * @param ConversationImageMapMessageArea $area
     */
    public function __construct($url, $area)
    {
        $this->url = $url;
        $this->area = $area;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationActionType::URL;
    }

    /**
     * @return URL
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * @return ConversationImageMapMessageArea
     */
    public function getArea()
    {
        return $this->area;
    }
}