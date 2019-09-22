<?php

require_once __DIR__ . '/../bootstrap.php';

use Conversation\Configure;
use Conversation\ConversationAction\ConversationUrlAction;
use Conversation\ConversationAssistantFactory;
use Conversation\ConversationMessage\ConversationFlexMessage;
use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexButton;
use Conversation\ConversationMessage\Flex\Component\FlexIcon;
use Conversation\ConversationMessage\Flex\Component\FlexImage;
use Conversation\ConversationMessage\Flex\Component\FlexSpacer;
use Conversation\ConversationMessage\Flex\Component\FlexText;
use Conversation\ConversationMessage\Flex\Container\FlexBubble;
use Conversation\ConversationMessage\Flex\Property\FlexButtonHeight;
use Conversation\ConversationMessage\Flex\Property\FlexButtonStyle;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexFontWeight;
use Conversation\ConversationMessage\Flex\Property\FlexIconSize;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectMode;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectRatio;
use Conversation\ConversationMessage\Flex\Property\FlexImageSize;
use Conversation\ConversationMessage\Flex\Property\FlexLayout;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexSpacerSize;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;
use Conversation\URL;

$bubble = new FlexBubble();
$bubble
    ->setHero(
        (new FlexImage())
            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png'))
            ->setSize(new FlexImageSize(FlexImageSize::FULL))
            ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_20TO13))
            ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
            ->setAction(new ConversationUrlAction('open', new URL('http://linecorp.com/')))
    )
    ->setBody(
        (new FlexBox())
            ->setLayout(new FlexLayout(FlexLayout::VERTICAL))
            ->addContent(
                (new FlexText())
                    ->setText('Brown Cafe')
                    ->setWeight(new FlexFontWeight(FlexFontWeight::BOLD))
                    ->setSize(new FlexFontSize(FlexFontSize::XL))
            )
            ->addContent(
                (new FlexBox())
                    ->setLayout(new FlexLayout(FlexLayout::BASELINE))
                    ->setMargin(new FlexMargin(FlexMargin::MD))
                    ->addContent(
                        (new FlexIcon())
                            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                            ->setSize(new FlexIconSize(FlexIconSize::SM))
                    )
                    ->addContent(
                        (new FlexIcon())
                            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                            ->setSize(new FlexIconSize(FlexIconSize::SM))
                    )
                    ->addContent(
                        (new FlexIcon())
                            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                            ->setSize(new FlexIconSize(FlexIconSize::SM))
                    )
                    ->addContent(
                        (new FlexIcon())
                            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png'))
                            ->setSize(new FlexIconSize(FlexIconSize::SM))
                    )
                    ->addContent(
                        (new FlexIcon())
                            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png'))
                            ->setSize(new FlexIconSize(FlexIconSize::SM))
                    )
                    ->addContent(
                        (new FlexText())
                            ->setText('4.0')
                            ->setSize(new FlexFontSize(FlexFontSize::SM))
                            ->setColor(new FlexColor('#999999'))
                            ->setMargin(new FlexMargin(FlexMargin::MD))
                            ->setFlex(0)
                    )
            )
            ->addContent(
                (new FlexBox())
                    ->setLayout(new FlexLayout(FlexLayout::VERTICAL))
                    ->setMargin(new FlexMargin(FlexMargin::LG))
                    ->setSpacing(new FlexSpacing(FlexSpacing::SM))
                    ->addContent(
                        (new FlexBox())
                            ->setLayout(new FlexLayout(FlexLayout::BASELINE))
                            ->setSpacing(new FlexSpacing(FlexSpacing::SM))
                            ->addContent(
                                (new FlexText())
                                    ->setText('Place')
                                    ->setColor(new FlexColor('#aaaaaa'))
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setFlex(1)
                            )
                            ->addContent(
                                (new FlexText())
                                    ->setText('Miraina Tower, 4-1-6 Shinjuku, Tokyo')
                                    ->setWrap(true)
                                    ->setColor(new FlexColor('#666666'))
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setFlex(5)
                            )
                    )
                    ->addContent(
                        (new FlexBox())
                            ->setLayout(new FlexLayout(FlexLayout::BASELINE))
                            ->setSpacing(new FlexSpacing(FlexSpacing::SM))
                            ->addContent(
                                (new FlexText())
                                    ->setText('Time')
                                    ->setColor(new FlexColor('#aaaaaa'))
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setFlex(1)
                            )
                            ->addContent(
                                (new FlexText())
                                    ->setText('10:00 - 23:00')
                                    ->setWrap(true)
                                    ->setColor(new FlexColor('#666666'))
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setFlex(5)
                            )
                    )
            )
    )
    ->setFooter(
        (new FlexBox())
            ->setLayout(new FlexLayout(FlexLayout::VERTICAL))
            ->setSpacing(new FlexSpacing(FlexSpacing::SM))
            ->setFlex(0)
            ->addContent(
                (new FlexButton())
                    ->setStyle(new FlexButtonStyle(FlexButtonStyle::LINK))
                    ->setHeight(new FlexButtonHeight(FlexButtonHeight::SM))
                    ->setAction(new ConversationUrlAction('CALL', new URL('https://linecorp.com')))
            )
            ->addContent(
                (new FlexButton())
                    ->setStyle(new FlexButtonStyle(FlexButtonStyle::LINK))
                    ->setHeight(new FlexButtonHeight(FlexButtonHeight::SM))
                    ->setAction(new ConversationUrlAction('WEBSITE', new URL('https://linecorp.com')))
            )
            ->addContent(
                (new FlexSpacer())
                    ->setSize(new FlexSpacerSize(FlexSpacerSize::SM))
            )
    );

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response = $assistant->push(
    new ConversationFlexMessage(
        'Restaurant',
        $bubble
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}