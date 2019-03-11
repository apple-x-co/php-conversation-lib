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

class ConversationLocationMessage extends AbstractConversationMessage
{
    /** @var null|string */
    private $title;

    /** @var null|string */
    private $address;

    /** @var null|string */
    private $latitude;

    /** @var null|string */
    private $longitude;

    /**
     * ConversationLocationMessage constructor.
     *
     * @param string $title
     * @param string $address
     * @param double $latitude
     * @param double $longitude
     */
    public function __construct($title, $address, $latitude, $longitude)
    {
        $this->title     = $title;
        $this->address   = $address;
        $this->latitude  = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationMessageType::LOCATION;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null|string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return null|double
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return null|double
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}