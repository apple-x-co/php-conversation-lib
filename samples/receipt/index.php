<?php

require_once __DIR__ . '/../bootstrap.php';

use Conversation\Configure;
use Conversation\ConversationAssistantFactory;
use Conversation\ConversationMessage\ConversationFlexMessage;
use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexSeparator;
use Conversation\ConversationMessage\Flex\Component\FlexText;
use Conversation\ConversationMessage\Flex\Container\FlexBlockStyle;
use Conversation\ConversationMessage\Flex\Container\FlexBubble;
use Conversation\ConversationMessage\Flex\Container\FlexBubbleStyle;
use Conversation\ConversationMessage\Flex\Property\FlexAlign;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexFontWeight;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;

$bubble = new FlexBubble();
$bubble
    ->setStyles(
        (new FlexBubbleStyle())
            ->setFooter(
                (new FlexBlockStyle())
                    ->setSeparator(true)
            )
    )
    ->setBody(
        FlexBox::vertical()
            ->addContent(
                FlexText::text('RECEIPT')
                    ->setWeight(new FlexFontWeight(FlexFontWeight::BOLD))
                    ->setColor(new FlexColor('#1DB446'))
                    ->setSize(new FlexFontSize(FlexFontSize::SM))
            )
            ->addContent(
                FlexText::text('Brown Store')
                    ->setWeight(new FlexFontWeight(FlexFontWeight::BOLD))
                    ->setSize(new FlexFontSize(FlexFontSize::XXL))
                    ->setMargin(FlexMargin::md())
            )
            ->addContent(
                FlexText::text('Miraina Tower, 4-1-6 Shinjuku, Tokyo')
                    ->setColor(new FlexColor('#aaaaaa'))
                    ->setSize(new FlexFontSize(FlexFontSize::XS))
                    ->setWrap(true)
            )
            ->addContent(
                (new FlexSeparator())
                    ->setMargin(new FlexMargin(FlexMargin::XXL))
            )
            ->addContent(
                FlexBox::vertical()
                    ->setMargin(new FlexMargin(FlexMargin::XXL))
                    ->setSpacing(new FlexSpacing(FlexSpacing::SM))
                    ->addContent(
                        (new FlexBox())
                            ->addContent(
                                FlexText::text('Energy Drink')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#555555'))
                                    ->setFlex(0)
                            )
                            ->addContent(
                                FlexText::text('$2.99')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#111111'))
                                    ->setAlign(new FlexAlign(FlexAlign::END))
                            )
                    )
                    ->addContent(
                        (new FlexBox())
                            ->addContent(
                                FlexText::text('Chewing Gum')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#555555'))
                                    ->setFlex(0)
                            )
                            ->addContent(
                                FlexText::text('$0.99')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#111111'))
                                    ->setAlign(new FlexAlign(FlexAlign::END))
                            )
                    )
                    ->addContent(
                        (new FlexBox())
                            ->addContent(
                                FlexText::text('Bottled Water')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#555555'))
                                    ->setFlex(0)
                            )
                            ->addContent(
                                FlexText::text('$3.33')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#111111'))
                                    ->setAlign(new FlexAlign(FlexAlign::END))
                            )
                    )
                    ->addContent(
                        (new FlexSeparator())
                            ->setMargin(new FlexMargin(FlexMargin::XXL))
                    )
                    ->addContent(
                        (new FlexBox())
                            ->setMargin(new FlexMargin(FlexMargin::XXL))
                            ->addContent(
                                FlexText::text('ITEMS')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#555555'))
                            )
                            ->addContent(
                                FlexText::text('3')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#111111'))
                                    ->setAlign(new FlexAlign(FlexAlign::END))
                            )
                    )
                    ->addContent(
                        (new FlexBox())
                            ->addContent(
                                FlexText::text('TOTAL')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#555555'))
                            )
                            ->addContent(
                                FlexText::text('$7.31')
                                    ->setSize(new FlexFontSize(FlexFontSize::SM))
                                    ->setColor(new FlexColor('#111111'))
                                    ->setAlign(new FlexAlign(FlexAlign::END))
                            )
                    )
            )
            ->addContent(
                (new FlexSeparator())
                    ->setMargin(new FlexMargin(FlexMargin::XXL))
            )
            ->addContent(
                (new FlexBox())
                    ->setMargin(new FlexMargin(FlexMargin::MD))
                    ->addContent(
                        FlexText::text('PAYMENT ID')
                            ->setSize(new FlexFontSize(FlexFontSize::XS))
                            ->setColor(new FlexColor('#aaaaaa'))
                            ->setFlex(0)
                    )
                    ->addContent(
                        FlexText::text('#743289384279')
                            ->setSize(new FlexFontSize(FlexFontSize::XS))
                            ->setColor(new FlexColor('#aaaaaa'))
                            ->setAlign(new FlexAlign(FlexAlign::END))
                    )
            )
    );

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response = $assistant->push(
    new ConversationFlexMessage(
        'Receipt',
        $bubble
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}