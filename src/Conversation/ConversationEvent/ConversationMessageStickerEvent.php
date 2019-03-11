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
use Conversation\Exception\ConversationMessageStickerEventMissingArgumentException;

class ConversationMessageStickerEvent extends AbstractConversationEvent
{
    public function __construct($content)
    {
        if ( ! (is_array($content))) {
            throw new ConversationMessageStickerEventMissingArgumentException();
        }

        parent::__construct(ConversationEventType::MESSAGE_STICKER, $content);
    }

    /**
     * @return null|string
     */
    public function getPackageId()
    {
        $content = $this->getContent();

        return $content['package_id'];
    }

    /**
     * @return null|string
     */
    public function getStickerId()
    {
        $content = $this->getContent();

        return $content['sticker_id'];
    }
}