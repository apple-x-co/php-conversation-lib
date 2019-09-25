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
use Conversation\ConversationMessage\Flex\Component\FlexSeparator;
use Conversation\ConversationMessage\Flex\Component\FlexSpacer;
use Conversation\ConversationMessage\Flex\Component\FlexText;
use Conversation\ConversationMessage\Flex\Container\FlexBlockStyle;
use Conversation\ConversationMessage\Flex\Container\FlexBubble;
use Conversation\ConversationMessage\Flex\Container\FlexBubbleStyle;
use Conversation\ConversationMessage\Flex\Property\FlexAlign;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexFontWeight;
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexIconSize;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectMode;
use Conversation\ConversationMessage\Flex\Property\FlexImageAspectRatio;
use Conversation\ConversationMessage\Flex\Property\FlexImageSize;
use Conversation\ConversationMessage\Flex\Property\FlexLayout;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;
use Conversation\URL;

$bubble = new FlexBubble();
$bubble
    ->setHero(
        FlexImage::image('https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_3_movie.png')
                 ->setSize(new FlexImageSize(FlexImageSize::FULL))
                 ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_20TO13))
                 ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
                 ->setAction(
                     new ConversationUrlAction('OPEN', new URL('http://linecorp.com/'))
                 )
    )
    ->setBody(
        (new FlexBox())
            ->setLayout(new FlexLayout(FlexLayout::VERTICAL))
            ->addContent(
                (new FlexText())
                    ->setText('BROWN\'S ADVENTURE IN MOVIE')
                    ->setWrap(true)
                    ->setWeight(new FlexFontWeight(FlexFontWeight::BOLD))
                    ->setGravity(FlexGravity::center())
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
                                FlexText::text('Date')
                                        ->setColor(new FlexColor('#aaaaaa'))
                                        ->setSize(new FlexFontSize(FlexFontSize::SM))
                                        ->setFlex(1)
                            )
                            ->addContent(
                                FlexText::text('Monday 25, 9:00PM')
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
                                FlexText::text('Place')
                                        ->setColor(new FlexColor('#aaaaaa'))
                                        ->setSize(new FlexFontSize(FlexFontSize::SM))
                                        ->setFlex(1)
                            )
                            ->addContent(
                                FlexText::text('7 Floor, No.3')
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
                                FlexText::text('Seats')
                                        ->setColor(new FlexColor('#aaaaaa'))
                                        ->setSize(new FlexFontSize(FlexFontSize::SM))
                                        ->setFlex(1)
                            )
                            ->addContent(
                                FlexText::text('C Row, 18 Seat')
                                        ->setWrap(true)
                                        ->setColor(new FlexColor('#666666'))
                                        ->setSize(new FlexFontSize(FlexFontSize::SM))
                                        ->setFlex(5)
                            )
                    )
            )
            ->addContent(
                FlexBox::vertical()
                       ->setMargin(FlexMargin::xxl())
                       ->addContent(new FlexSpacer())
                       ->addContent(
                           FlexImage::image('https://scdn.line-apps.com/n/channel_devcenter/img/fx/linecorp_code_withborder.png')
                                    ->setAspectMode(FlexImageAspectMode::cover())
                                    ->setSize(FlexImageSize::xl())
                       )
                       ->addContent(
                           FlexText::text('You can enter the theater by using this code instead of a ticket')
                                   ->setColor(new FlexColor('#aaaaaa'))
                                   ->setWrap(true)
                                   ->setMargin(FlexMargin::xxl())
                                   ->setSize(FlexFontSize::xs())
                       )
            )
    );

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response  = $assistant->push(
    new ConversationFlexMessage(
        'Ticket',
        $bubble
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}