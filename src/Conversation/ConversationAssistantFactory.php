<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


use Conversation\Exception\ConversationAssistantUnknownException;

class ConversationAssistantFactory
{

    /**
     * @param Configure $configure
     * @param string $someone
     *
     * @return ConversationAssistantInterface
     *
     * @throws ConversationAssistantUnknownException
     */
    public static function createConversationAssistant($configure, $someone = 'bot')
    {
        if ($someone === 'bot') {
            return new LineConversationAssistant($configure);
        } elseif ($someone === 'mock') {
            return new MockConversationAssistant($configure);
        }
        throw new ConversationAssistantUnknownException();
    }
}