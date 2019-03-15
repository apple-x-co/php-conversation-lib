<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 17:15
 */

namespace Conversation;


class ConversationEventHandler
{
    /**
     * @param Configure $configure
     * @param AbstractConversationEvent $conversationEvent
     *
     * @return AbstractConversationEventHandler|null
     */
    public static function get($configure, $conversationEvent)
    {
        $event_names = [
            ConversationEventType::BEFORE_FILTER,
            $conversationEvent->getType(),
            ConversationEventType::AFTER_FILTER
        ];

        $class_names = [];
        foreach ($event_names as $event_name) {
            $names = $configure->read(implode('.', ['Conversation', 'eventHandler', $event_name]));
            if (empty($names) || ! is_array($names)) {
                continue;
            }
            $class_names = array_merge($class_names, $names);
        }
        if (is_null($class_names) || empty($class_names)) {
            return null;
        }

        /** @var AbstractConversationEventHandler[] $handlers */
        /** @var AbstractConversationEventHandler $handler */
        /** @var AbstractConversationEventHandler $prevHandler */

        $handlers    = [];
        $prevHandler = null;

        foreach ($class_names as $class_name) {
            if ( ! class_exists($class_name)) {
                continue;
            }

            $handler = new $class_name;
            if ( ! ($handler instanceof AbstractConversationEventHandler)) {
                continue;
            }

            $handlers[] = $handler;

            if (is_null($prevHandler)) {
                $prevHandler = $handler;
                continue;
            }

            $prevHandler->setHandler($handler);
            $prevHandler = $handler;
        }

        if (empty($handlers)) {
            return null;
        }

        return $handlers[0];
    }
}