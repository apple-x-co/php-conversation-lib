<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationMessage;

use Conversation\AbstractConversationMessage;
use Conversation\Exception\ConversationMessage\ConversationImageMessageMissingArgumentException;
use Conversation\URL;
use Conversation\ConversationMessageType;

class ConversationImageMessage extends AbstractConversationMessage
{
    /** @var URL */
    private $original_url;

    /** @var URL */
    private $preview_url;

    /**
     * ConversationImageMessage constructor.
     *
     * @param URL $original_url
     * @param URL $preview_url
     */
    public function __construct($original_url, $preview_url)
    {
        if ( ! ($original_url instanceof URL) ||
             ! ($preview_url instanceof URL)) {
            throw new ConversationImageMessageMissingArgumentException();
        }

        $this->original_url = $original_url;
        $this->preview_url  = $preview_url;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::IMAGE;
    }

    /**
     * @return URL
     */
    public function getOriginalURL()
    {
        return $this->original_url;
    }

    /**
     * @return URL
     */
    public function getPreviewURL()
    {
        return $this->preview_url;
    }
}