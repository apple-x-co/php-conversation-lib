<?php

require_once __DIR__ . '/../bootstrap.php';

use Conversation\Configure;
use Conversation\ConversationAssistantFactory;
use Conversation\ConversationMessage\ConversationFlexMessage;
use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexIcon;
use Conversation\ConversationMessage\Flex\Component\FlexImage;
use Conversation\ConversationMessage\Flex\Component\FlexText;
use Conversation\ConversationMessage\Flex\Container\FlexBubble;
use Conversation\ConversationMessage\Flex\Property\FlexAlign;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexDecoration;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexFontWeight;
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectMode;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectRatio;
use Conversation\ConversationMessage\Flex\Property\FlexImageSize;
use Conversation\ConversationMessage\Flex\Property\FlexLayout;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexPosition;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;
use Conversation\URL;

$bubble = new FlexBubble();
$bubble->setHeader(
    (new FlexBox())
        ->setLayout(FlexLayout::vertical())
        ->setPaddingAll('0px')
        ->addContent(
            (new FlexBox())
                ->setLayout(FlexLayout::horizontal())
                ->addContent(
                    (new FlexImage())
                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip4.jpg'))
                        ->setSize(FlexImageSize::full())
                        ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
                        ->setAspectRatio(new FlexImageAspectRatio('150:196'))
                        ->setGravity(FlexGravity::center())
                        ->setFlex(1)
                )
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::vertical())
                        ->setFlex(1)
                        ->addContent(
                            (new FlexImage())
                                ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip5.jpg'))
                                ->setSize(FlexImageSize::full())
                                ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
                                ->setAspectRatio(new FlexImageAspectRatio('150:98'))
                                ->setGravity(FlexGravity::center())
                        )
                        ->addContent(
                            (new FlexImage())
                                ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip6.jpg'))
                                ->setSize(FlexImageSize::full())
                                ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
                                ->setAspectRatio(new FlexImageAspectRatio('150:98'))
                                ->setGravity(FlexGravity::center())
                        )
                )
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::horizontal())
                        ->setBackgroundColor(FlexColor::hex('#EC3D44'))
                        ->setPaddingAll('2px')
                        ->setPaddingStart('4px')
                        ->setPaddingEnd('4px')
                        ->setFlex(0)
                        ->setPosition(FlexPosition::absolute())
                        ->setOffsetStart('18px')
                        ->setOffsetTop('18px')
                        ->setCornerRadius('100px')
                        ->setWidth('48px')
                        ->setHeight('25px')
                        ->addContent(
                            (new FlexText())
                                ->setText('NEW')
                                ->setSize(FlexFontSize::xs())
                                ->setColor(FlexColor::hex('#ffffff'))
                                ->setAlign(FlexAlign::center())
                                ->setGravity(FlexGravity::center())
                        )
                )
        )
);
$bubble->setBody(
    (new FlexBox())
        ->setLayout(FlexLayout::vertical())
        ->setPaddingAll('20px')
        ->setBackgroundColor(FlexColor::hex('#464F69'))
        ->addContent(
            (new FlexBox())
                ->setLayout(FlexLayout::vertical())
                ->setSpacing(FlexSpacing::sm())
                ->addContent(
                    (new FlexText())
                        ->setText('Cony Residence')
                        ->setSize(FlexFontSize::xl())
                        ->setWrap(true)
                        ->setColor(FlexColor::hex('#ffffff'))
                        ->setWeight(FlexFontWeight::bold())
                )
                ->addContent(
                    (new FlexText())
                        ->setText('3 Bedrooms, ¥35,000')
                        ->setColor(FlexColor::hex('#ffffffcc'))
                        ->setSize(FlexFontSize::sm())
                )
        )
        ->addContent(
            (new FlexBox())
                ->setLayout(FlexLayout::vertical())
                ->setPaddingAll('13px')
                ->setBackgroundColor(FlexColor::hex('#ffffff1A'))
                ->setCornerRadius('2px')
                ->setMargin(FlexMargin::xl())
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::vertical())
                        ->addContent(
                            (new FlexText())
                                ->setText('Private Pool, Delivery box, Floor heating, Private Cinema')
                                ->setSize(FlexFontSize::sm())
                                ->setWrap(true)
                                ->setMargin(FlexMargin::lg())
                                ->setColor(FlexColor::hex('#ffffffde'))
                        )
                )
        )
);

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response = $assistant->push(
    new ConversationFlexMessage(
        'Real estate',
        $bubble
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}