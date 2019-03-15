<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationEvent;

use Conversation\AbstractConversationEvent;
use Conversation\Exception\ConversationMessageImageEventMissingArgumentException;
use Conversation\File;
use Conversation\UploadFile;
use Conversation\ConversationEventType;

class ConversationMessageImageEvent extends AbstractConversationEvent
{
    public function __construct($content)
    {
        if ( ! ($content instanceof File)) {
            throw new ConversationMessageImageEventMissingArgumentException();
        }

        parent::__construct(ConversationEventType::MESSAGE_IMAGE, $content);
    }

    /**
     * @return File
     */
    public function getContent()
    {
        return parent::getContent();
    }
}