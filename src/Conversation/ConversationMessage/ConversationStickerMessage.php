<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationMessage;

use Conversation\AbstractConversationMessage;
use Conversation\ConversationMessageType;

class ConversationStickerMessage extends AbstractConversationMessage
{
    /** @var string */
    private $package_id;

    /** @var string */
    private $sticker_id;

    /**
     * ConversationStickerMessage constructor.
     *
     * @param string $package_id
     * @param string $sticker_id
     */
    public function __construct($package_id, $sticker_id)
    {
        $this->package_id = $package_id;
        $this->sticker_id = $sticker_id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::STICKER;
    }

    /**
     * @return null|string
     */
    public function getPackageId()
    {
        return $this->package_id;
    }

    /**
     * @return null|string
     */
    public function getStickerId()
    {
        return $this->sticker_id;
    }
}