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
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectMode;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectRatio;
use Conversation\ConversationMessage\Flex\Property\FlexImageSize;
use Conversation\ConversationMessage\Flex\Property\FlexLayout;
use Conversation\ConversationMessage\Flex\Property\FlexPosition;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;
use Conversation\URL;

$bubble = new FlexBubble();
$bubble->setBody(
    (new FlexBox())
        ->setLayout(FlexLayout::vertical())
        ->setPaddingAll('0px')
        ->addContent(
            (new FlexImage())
                ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip3.jpg'))
                ->setSize(FlexImageSize::full())
                ->setAspectMode(FlexImageAspectMode::cover())
                ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_1TO1))
                ->setGravity(FlexGravity::center())
        )
        ->addContent(
            (new FlexImage())
                ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip15.png'))
                ->setSize(FlexImageSize::full())
                ->setAspectMode(FlexImageAspectMode::cover())
                ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_1TO1))
                ->setPosition(FlexPosition::absolute())
                ->setOffsetTop('0px')
                ->setOffsetBottom('0px')
                ->setOffsetStart('0px')
                ->setOffsetEnd('0px')
        )
        ->addContent(
            (new FlexBox())
                ->setLayout(FlexLayout::horizontal())
                ->setPosition(FlexPosition::absolute())
                ->setOffsetBottom('0px')
                ->setOffsetStart('0px')
                ->setOffsetEnd('0px')
                ->setPaddingAll('20px')
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::vertical())
                        ->setSpacing(FlexSpacing::xs())
                        ->addContent(
                            (new FlexText())
                                ->setText('Brown Grand Hotel')
                                ->setSize(FlexFontSize::xl())
                                ->setColor(FlexColor::hex('#ffffff'))
                        )
                        ->addContent(
                            (new FlexBox())
                                ->setLayout(FlexLayout::baseline())
                                ->addContent(
                                    (new FlexIcon())
                                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                                )
                                ->addContent(
                                    (new FlexIcon())
                                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                                )
                                ->addContent(
                                    (new FlexIcon())
                                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                                )
                                ->addContent(
                                    (new FlexIcon())
                                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                                )
                                ->addContent(
                                    (new FlexIcon())
                                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png'))
                                )
                                ->addContent(
                                    (new FlexText())
                                        ->setText('4.0')
                                        ->setColor(FlexColor::hex('#a9a9a9'))
                                )
                        )
                        ->addContent(
                            (new FlexBox())
                                ->setLayout(FlexLayout::baseline())
                                ->setSpacing(FlexSpacing::lg())
                                ->setFlex(0)
                                ->addContent(
                                    (new FlexText())
                                        ->setText('¥62,000')
                                        ->setSize(FlexFontSize::md())
                                        ->setColor(FlexColor::hex('#ffffff'))
                                        ->setFlex(0)
                                        ->setAlign(FlexAlign::end())
                                )
                                ->addContent(
                                    (new FlexText())
                                        ->setText('¥82,000')
                                        ->setSize(FlexFontSize::md())
                                        ->setColor(FlexColor::hex('#a9a9a9'))
                                        ->setDecoration(FlexDecoration::line_through())
                                        ->setFlex(0)
                                        ->setAlign(FlexAlign::end())
                                )
                        )
                )
        )
);

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response = $assistant->push(
    new ConversationFlexMessage(
        'Hotel',
        $bubble
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}