<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 11:53
 */

namespace Conversation;


class Profile
{
    /** @var string */
    private $display_name;

    /** @var string */
    private $user_id;

    /** @var URL|null */
    private $pictureUrl;

    /** @var string */
    private $status_message;

    /**
     * Profile constructor.
     *
     * @param string $display_name
     * @param string $user_id
     * @param URL|null $pictureUrl
     * @param string $status_message
     */
    public function __construct($display_name, $user_id, $pictureUrl, $status_message)
    {
        $this->display_name   = $display_name;
        $this->user_id        = $user_id;
        $this->pictureUrl     = $pictureUrl;
        $this->status_message = $status_message;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return URL|null
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->status_message;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return [
            'display_name' => $this->display_name,
            'user_id' => $this->user_id,
            'pictureUrl' => $this->pictureUrl,
            'status_message' => $this->status_message
        ];
    }
}
