<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/09/18
 * Time: 8:47
 */

namespace Conversation\ConversationMenu;


use Conversation\AbstractConversationAction;

class ConversationMenuArea
{
    /** @var ConversationMenuBounds */
    private $bounds;

    /** @var AbstractConversationAction */
    private $action;

    /**
     * ConversationMenuArea constructor.
     *
     * @param $bounds
     * @param $action
     */
    public function __construct($bounds, $action)
    {
        $this->bounds = $bounds;
        $this->action = $action;
    }

    /**
     * @return ConversationMenuBounds
     */
    public function getBounds()
    {
        return $this->bounds;
    }

    /**
     * @return AbstractConversationAction
     */
    public function getAction()
    {
        return $this->action;
    }
}
