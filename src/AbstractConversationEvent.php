<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:30
 */

namespace Conversation;


use Conversation\Exception\ConversationUnknownEventException;

abstract class AbstractConversationEvent
{
    /** @var array */
    const TYPES = [
        ConversationEventType::MESSAGE,
        ConversationEventType::MESSAGE_TEXT,
        ConversationEventType::MESSAGE_IMAGE,
        ConversationEventType::MESSAGE_VIDEO,
        ConversationEventType::MESSAGE_AUDIO,
        ConversationEventType::MESSAGE_FILE,
        ConversationEventType::MESSAGE_LOCATION,
        ConversationEventType::MESSAGE_STICKER,
        ConversationEventType::POSTBACK,
        ConversationEventType::FOLLOW,
        ConversationEventType::UNFOLLOW,
        ConversationEventType::JOIN,
        ConversationEventType::BEACON
    ];

    /**
     * @var string
     * @see ConversationEventType
     */
    private $type;

    /** @var mixed */
    private $content;

    /** @var mixed[] */
    private $attributes;

    /**
     * AbstractConversationMessage constructor.
     *
     * @param string $type
     * @param mixed $content
     */
    public function __construct($type, $content)
    {
        if ( ! array_search($type, $this::TYPES, true)) {
            throw new ConversationUnknownEventException();
        }
        $this->type    = $type;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }
}