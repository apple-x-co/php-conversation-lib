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

class ConversationFollowEvent extends AbstractConversationEvent
{
    public function __construct()
    {
        parent::__construct(ConversationEventType::FOLLOW, null);
    }
}