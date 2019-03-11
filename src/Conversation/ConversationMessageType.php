<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 11:36
 */

namespace Conversation;


class ConversationMessageType
{
    const TEXT = 'text';
    const CONFIRM = 'confirm';
    const IMAGE = 'image';
    const IMAGE_MAP = 'image-map';
    const MULTIPLE_ACTION = 'multiple-action';
    const CAROUSEL = 'carousel';
    const IMAGE_CAROUSEL = 'image-carousel';
    const STICKER = 'sticker';
    const MULTI = 'multi';
    const LOCATION = 'location';
    const FLEX = 'flex';
}