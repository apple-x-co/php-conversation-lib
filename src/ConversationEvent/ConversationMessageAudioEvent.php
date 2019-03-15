<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationEvent;

use Conversation\AbstractConversationEvent;
use Conversation\ConversationEventType;

class ConversationMessageAudioEvent extends AbstractConversationEvent
{
    public function __construct($content)
    {
        parent::__construct(ConversationEventType::MESSAGE_AUDIO, $content);
    }
}