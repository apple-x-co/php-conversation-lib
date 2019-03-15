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
use Conversation\Exception\ConversationMessageLocationEventMissingArgumentException;

class ConversationMessageLocationEvent extends AbstractConversationEvent
{
    public function __construct($content)
    {
        if ( ! (is_array($content))) {
            throw new ConversationMessageLocationEventMissingArgumentException();
        }

        parent::__construct(ConversationEventType::MESSAGE_LOCATION, $content);
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        $content = $this->getContent();

        return $content['title'];
    }

    /**
     * @return null|string
     */
    public function getAddress()
    {
        $content = $this->getContent();

        return $content['address'];
    }

    /**
     * @return null|double
     */
    public function getLatitude()
    {
        $content = $this->getContent();

        return $content['latitude'];
    }

    /**
     * @return null|double
     */
    public function getLongitude()
    {
        $content = $this->getContent();

        return $content['longitude'];
    }
}