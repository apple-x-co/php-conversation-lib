<?php

require_once __DIR__ . '/../bootstrap.php';

use Conversation\Configure;
use Conversation\ConversationAssistantFactory;
use Conversation\ConversationMessage\ConversationFlexMessage;
use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexFiller;
use Conversation\ConversationMessage\Flex\Component\FlexText;
use Conversation\ConversationMessage\Flex\Container\FlexBlockStyle;
use Conversation\ConversationMessage\Flex\Container\FlexBubble;
use Conversation\ConversationMessage\Flex\Container\FlexBubbleStyle;
use Conversation\ConversationMessage\Flex\Container\FlexCarousel;
use Conversation\ConversationMessage\Flex\Property\FlexAlign;
use Conversation\ConversationMessage\Flex\Property\FlexBubbleSize;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;

$carousel = new FlexCarousel();
$carousel->addContent(
    (new FlexBubble())
        ->setSize(FlexBubbleSize::nano())
        ->setStyles(
            (new FlexBubbleStyle())
                ->setFooter(
                    (new FlexBlockStyle())
                        ->setSeparator(false)
                )
        )
        ->setHeader(
            FlexBox::vertical()
                ->setBackgroundColor(FlexColor::hex('#27ACB2'))
                ->setPaddingAll('12px')
                ->setPaddingTop('19px')
                ->setPaddingBottom('16px')
                ->addContent(
                    FlexText::text('In Progress')
                        ->setColor(FlexColor::hex('#ffffff'))
                        ->setAlign(FlexAlign::start())
                        ->setSize(FlexFontSize::md())
                        ->setGravity(FlexGravity::center())
                )
                ->addContent(
                    FlexText::text('70%')
                        ->setColor(FlexColor::hex('#ffffff'))
                        ->setAlign(FlexAlign::start())
                        ->setSize(FlexFontSize::xs())
                        ->setGravity(FlexGravity::center())
                        ->setMargin(FlexMargin::lg())
                )
                ->addContent(
                    FlexBox::vertical()
                        ->setBackgroundColor(FlexColor::hex('#9FD8E36E'))
                        ->setHeight('6px')
                        ->setMargin(FlexMargin::sm())
                        ->addContent(
                            FlexBox::vertical()
                                ->setBackgroundColor(FlexColor::hex('#0D8186'))
                                ->setWidth('70%')
                                ->setHeight('6px')
                                ->addContent(new FlexFiller())
                        )
                )
        )
        ->setBody(
            FlexBox::vertical()
                ->setSpacing(FlexSpacing::md())
                ->setPaddingAll('12px')
                ->addContent(
                    FlexText::text('Buy milk and lettuce before class')
                        ->setColor(FlexColor::hex('#8C8C8C'))
                        ->setSize(FlexFontSize::sm())
                        ->setWrap(true)
                )
        )
);
$carousel->addContent(
    (new FlexBubble())
        ->setSize(FlexBubbleSize::nano())
        ->setStyles(
            (new FlexBubbleStyle())
                ->setFooter(
                    (new FlexBlockStyle())
                        ->setSeparator(false)
                )
        )
        ->setHeader(
            FlexBox::vertical()
                ->setBackgroundColor(FlexColor::hex('#FF6B6E'))
                ->setPaddingAll('12px')
                ->setPaddingTop('19px')
                ->setPaddingBottom('16px')
                ->addContent(
                    FlexText::text('In Progress')
                        ->setColor(FlexColor::hex('#ffffff'))
                        ->setAlign(FlexAlign::start())
                        ->setSize(FlexFontSize::md())
                        ->setGravity(FlexGravity::center())
                )
                ->addContent(
                    FlexText::text('30%')
                        ->setColor(FlexColor::hex('#ffffff'))
                        ->setAlign(FlexAlign::start())
                        ->setSize(FlexFontSize::xs())
                        ->setGravity(FlexGravity::center())
                        ->setMargin(FlexMargin::lg())
                )
                ->addContent(
                    FlexBox::vertical()
                        ->setBackgroundColor(FlexColor::hex('#FAD2A76E'))
                        ->setHeight('6px')
                        ->setMargin(FlexMargin::sm())
                        ->addContent(
                            FlexBox::vertical()
                                ->setBackgroundColor(FlexColor::hex('#DE5658'))
                                ->setWidth('30%')
                                ->setHeight('6px')
                                ->addContent(new FlexFiller())
                        )
                )
        )
        ->setBody(
            FlexBox::vertical()
                   ->setSpacing(FlexSpacing::md())
                   ->setPaddingAll('12px')
                   ->addContent(
                       FlexText::text('Wash my car')
                               ->setColor(FlexColor::hex('#8C8C8C'))
                               ->setSize(FlexFontSize::sm())
                               ->setWrap(true)
                   )
        )
);
$carousel->addContent(
    (new FlexBubble())
        ->setSize(FlexBubbleSize::nano())
        ->setStyles(
            (new FlexBubbleStyle())
                ->setFooter(
                    (new FlexBlockStyle())
                        ->setSeparator(false)
                )
        )
        ->setHeader(
            FlexBox::vertical()
                ->setBackgroundColor(FlexColor::hex('#A17DF5'))
                ->setPaddingAll('12px')
                ->setPaddingTop('19px')
                ->setPaddingBottom('16px')
                ->addContent(
                    FlexText::text('In Progress')
                        ->setColor(FlexColor::hex('#ffffff'))
                        ->setAlign(FlexAlign::start())
                        ->setSize(FlexFontSize::md())
                        ->setGravity(FlexGravity::center())
                )
                ->addContent(
                    FlexText::text('100%')
                        ->setColor(FlexColor::hex('#ffffff'))
                        ->setAlign(FlexAlign::start())
                        ->setSize(FlexFontSize::xs())
                        ->setGravity(FlexGravity::center())
                        ->setMargin(FlexMargin::lg())
                )
                ->addContent(
                    FlexBox::vertical()
                        ->setBackgroundColor(FlexColor::hex('#9FD8E36E'))
                        ->setHeight('6px')
                        ->setMargin(FlexMargin::sm())
                        ->addContent(
                            FlexBox::vertical()
                                ->setBackgroundColor(FlexColor::hex('#7D51E4'))
                                ->setWidth('100%')
                                ->setHeight('6px')
                                ->addContent(new FlexFiller())
                        )
                )
        )
        ->setBody(
            FlexBox::vertical()
                   ->setSpacing(FlexSpacing::md())
                   ->setPaddingAll('12px')
                   ->addContent(
                       FlexText::text('Buy milk and lettuce before class')
                               ->setColor(FlexColor::hex('#8C8C8C'))
                               ->setSize(FlexFontSize::sm())
                               ->setWrap(true)
                   )
        )
);

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response = $assistant->push(
    new ConversationFlexMessage(
        'ToDo',
        $carousel
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}