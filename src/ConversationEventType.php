<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 11:33
 */

namespace Conversation;


class ConversationEventType
{
    const BEFORE_FILTER = 'beforeFilter';
    const AFTER_FILTER = 'afterFilter';

    const MESSAGE = 'message';
    const MESSAGE_TEXT = 'messageText';
    const MESSAGE_IMAGE = 'messageImage';
    const MESSAGE_VIDEO = 'messageVideo';
    const MESSAGE_AUDIO = 'messageAudio';
    const MESSAGE_FILE = 'messageFile';
    const MESSAGE_LOCATION = 'messageLocation';
    const MESSAGE_STICKER = 'messageSticker';
    const POSTBACK = 'postback';
    const FOLLOW = 'follow';
    const UNFOLLOW = 'unfollow';
    const JOIN = 'join';
    const BEACON = 'beacon';
}