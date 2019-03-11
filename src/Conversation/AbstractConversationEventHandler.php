<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


abstract class AbstractConversationEventHandler
{
    /** @var null|AbstractConversationEventHandler */
    private $next_handler;

    /**
     * @param ConversationEventHandlerContext $context
     *
     * @return bool|AbstractConversationMessage[]
     */
    protected abstract function execHandle($context);

    /**
     * @return string
     */
    protected abstract function getErrorMessage();

    /**
     * AbstractConversationEventHandler constructor.
     */
    public function __construct()
    {
        $this->next_handler = null;
    }

    /**
     * @param AbstractConversationEventHandler $handler
     *
     * @return AbstractConversationEventHandler
     */
    public function setHandler($handler)
    {
        $this->next_handler = $handler;

        return $this;
    }

    /**
     * @return AbstractConversationEventHandler
     */
    public function getNextHandler()
    {
        return $this->next_handler;
    }

    /**
     * @param ConversationEventHandlerContext $context
     *
     * @return AbstractConversationMessage[]
     */
    public function handle($context)
    {
        $messages = [];

        $result = $this->execHandle($context);
        if ($result === false) {
            return [];
        } elseif (is_array($result)) {
            $messages = array_merge($messages, $result);
        }

        if ( ! is_null($this->getNextHandler())) {
            $next_result = $this->getNextHandler()->handle($context);
            if ($result === false) {
                return $messages;
            } elseif (is_array($next_result)) {
                $messages = array_merge($messages, $next_result);
            }

            return $messages;
        }

        return $messages;
    }
}