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
        FlexImage::image('https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_2_restaurant.png')
            ->setSize(new FlexImageSize(FlexImageSize::FULL))
            ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_20TO13))
            ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
            ->setAction(
                new ConversationUrlAction('OPEN', new URL('http://linecorp.com/'))
            )
    )
    ->setBody(
        FlexBox::vertical()
            ->setSpacing(FlexSpacing::md())
            ->setAction(
                new ConversationUrlAction('Add to Cart', new URL('http://linecorp.com/'))
            )
            ->addContent(
                FlexText::text('Brown\'s Burger')
                    ->setSize(FlexFontSize::xl())
                    ->setWeight(FlexFontWeight::bold())
            )
            ->addContent(
                FlexBox::vertical()
                    ->setSpacing(FlexSpacing::sm())
                    ->addContent(
                        FlexBox::baseline()
                            ->addContent(
                                FlexIcon::icon('https://scdn.line-apps.com/n/channel_devcenter/img/fx/restaurant_regular_32.png')
                            )
                            ->addContent(
                                FlexText::text('$10.5')
                                    ->setWeight(FlexFontWeight::bold())
                                    ->setSize(FlexFontSize::sm())
                                    ->setFlex(0)
                            )
                            ->addContent(
                                FlexText::text('400kcl')
                                        ->setSize(FlexFontSize::sm())
                                        ->setAlign(FlexAlign::end())
                                        ->setColor(FlexColor::hex('#aaaaaa'))
                            )
                    )
                    ->addContent(
                        FlexBox::baseline()
                            ->addContent(
                                FlexIcon::icon('https://scdn.line-apps.com/n/channel_devcenter/img/fx/restaurant_large_32.png')
                            )
                            ->addContent(
                                FlexText::text('$15.5')
                                        ->setWeight(FlexFontWeight::bold())
                                        ->setSize(FlexFontSize::sm())
                                        ->setFlex(0)
                            )
                            ->addContent(
                                FlexText::text('500kcl')
                                        ->setSize(FlexFontSize::sm())
                                        ->setAlign(FlexAlign::end())
                                        ->setColor(FlexColor::hex('#aaaaaa'))
                            )
                    )
            )
            ->addContent(
                FlexText::text('Sauce, Onions, Pickles, Lettuce & Cheese')
                    ->setWrap(true)
                    ->setColor(FlexColor::hex('#aaaaaa'))
                    ->setSize(FlexFontSize::xxs())
            )
    )
    ->setFooter(
        FlexBox::vertical()
            ->addContent(FlexSpacer::xxl())
            ->addContent(
                FlexButton::primary()
                    ->setColor(FlexColor::hex('#905c44'))
                    ->setAction(
                        new ConversationUrlAction('Add to Cart', new URL('http://linecorp.com/'))
                    )
            )
    );

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response = $assistant->push(
    new ConversationFlexMessage(
        'Menu',
        $bubble
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}