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
use Conversation\Exception\ConversationMessageFileEventMissingArgumentException;
use Conversation\File;

class ConversationMessageFileEvent extends AbstractConversationEvent
{
    public function __construct($content)
    {
        if ( ! ($content instanceof File)) {
            throw new ConversationMessageFileEventMissingArgumentException();
        }

        parent::__construct(ConversationEventType::MESSAGE_FILE, $content);
    }

    /**
     * @return File
     */
    public function getContent()
    {
        return parent::getContent();
    }
}