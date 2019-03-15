<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 13:50
 */

namespace Conversation;


class ConversationActionType
{
    const MESSAGE = 'message';
    const POSTBACK = 'postback';
    const URL = 'url';
    const DATETIME_PICKER = 'datetimepicker';
    const ACTION = 'action';
    const CAMERA = 'camera';
    const CAMERA_ROLE = 'cameraRoll';
    const LOCATION = 'location';
}