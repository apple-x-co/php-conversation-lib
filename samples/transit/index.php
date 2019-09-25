<?php

require_once __DIR__ . '/../bootstrap.php';

use Conversation\Configure;
use Conversation\ConversationAssistantFactory;
use Conversation\ConversationMessage\ConversationFlexMessage;
use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexFiller;
use Conversation\ConversationMessage\Flex\Component\FlexText;
use Conversation\ConversationMessage\Flex\Container\FlexBubble;
use Conversation\ConversationMessage\Flex\Property\FlexBorderWidth;
use Conversation\ConversationMessage\Flex\Property\FlexColor;
use Conversation\ConversationMessage\Flex\Property\FlexFontSize;
use Conversation\ConversationMessage\Flex\Property\FlexFontWeight;
use Conversation\ConversationMessage\Flex\Property\FlexGravity;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;

$bubble =
    FlexBubble::mega()
              ->setHeader(
                  FlexBox::vertical()
                         ->setPaddingAll('20px')
                         ->setBackgroundColor(FlexColor::hex('#0367D3'))
                         ->setSpacing(FlexSpacing::md())
                         ->setHeight('154px')
                         ->setPaddingTop('22px')
                         ->addContent(
                             FlexBox::vertical()
                                    ->addContent(
                                        FlexText::text('FROM')
                                                ->setColor(FlexColor::hex('#ffffff66'))
                                                ->setSize(FlexFontSize::sm())
                                    )
                                    ->addContent(
                                        FlexText::text('Akihabara')
                                                ->setColor(FlexColor::hex('#ffffff'))
                                                ->setSize(FlexFontSize::xl())
                                                ->setFlex(4)
                                                ->setWeight(FlexFontWeight::bold())
                                    )
                         )
                         ->addContent(
                             FlexBox::vertical()
                                    ->addContent(
                                        FlexText::text('TO')
                                                ->setColor(FlexColor::hex('#ffffff66'))
                                                ->setSize(FlexFontSize::sm())
                                    )
                                    ->addContent(
                                        FlexText::text('Shinjuku')
                                                ->setColor(FlexColor::hex('#ffffff'))
                                                ->setSize(FlexFontSize::xl())
                                                ->setFlex(4)
                                                ->setWeight(FlexFontWeight::bold())
                                    )
                         )
              )
              ->setBody(
                  FlexBox::vertical()
                         ->setPaddingAll('20px')
                         ->addContent(
                             FlexText::text('Total: 1 hour')
                                     ->setColor(FlexColor::hex('#b7b7b7'))
                                     ->setSize(FlexFontSize::xs())
                         )
                         ->addContent(
                             FlexBox::horizontal()
                                    ->setSpacing(FlexSpacing::lg())
                                    ->setCornerRadius('30px')
                                    ->setMargin(FlexMargin::xl())
                                    ->addContent(
                                        FlexText::text('20:30')
                                                ->setSize(FlexFontSize::sm())
                                                ->setGravity(FlexGravity::center())
                                    )
                                    ->addContent(
                                        FlexBox::vertical()
                                               ->setFlex(0)
                                               ->addContent(new FlexFiller())
                                               ->addContent(
                                                   FlexBox::vertical()
                                                          ->setCornerRadius('30px')
                                                          ->setHeight('12px')
                                                          ->setWidth('12px')
                                                          ->setBorderColor(FlexColor::hex('#EF454D'))
                                                          ->setBorderWidth(new FlexBorderWidth('2px'))
                                                          ->addContent(new FlexFiller())
                                               )
                                               ->addContent(new FlexFiller())
                                    )
                                    ->addContent(
                                        FlexText::text('Akihabara')
                                                ->setGravity(FlexGravity::center())
                                                ->setFlex(4)
                                                ->setSize(FlexFontSize::sm())
                                    )
                         )
                         ->addContent(
                             FlexBox::horizontal()
                                    ->setSpacing(FlexSpacing::lg())
                                    ->setHeight('64px')
                                    ->addContent(
                                        FlexBox::baseline()
                                               ->addContent(new FlexFiller())
                                               ->setFlex(1)
                                    )
                                    ->addContent(
                                        FlexBox::vertical()
                                               ->setWidth('12px')
                                               ->addContent(
                                                   FlexBox::horizontal()
                                                          ->setFlex(1)
                                                          ->addContent(new FlexFiller())
                                                          ->addContent(
                                                              FlexBox::vertical()
                                                                     ->setWidth('2px')
                                                                     ->setBackgroundColor(FlexColor::hex('#B7B7B7'))
                                                                     ->addContent(new FlexFiller())
                                                          )
                                                          ->addContent(new FlexFiller())
                                               )
                                    )
                                    ->addContent(
                                        FlexText::text('Walk 4min')
                                                ->setGravity(FlexGravity::center())
                                                ->setFlex(4)
                                                ->setSize(FlexFontSize::xs())
                                                ->setColor(FlexColor::hex('#8c8c8c'))
                                    )
                         )
                         ->addContent(
                             FlexBox::horizontal()
                                    ->setSpacing(FlexSpacing::lg())
                                    ->setCornerRadius('30px')
                                    ->setMargin(FlexMargin::xl())
                                    ->addContent(
                                        FlexText::text('20:34')
                                                ->setSize(FlexFontSize::sm())
                                                ->setGravity(FlexGravity::center())
                                    )
                                    ->addContent(
                                        FlexBox::vertical()
                                               ->setFlex(0)
                                               ->addContent(new FlexFiller())
                                               ->addContent(
                                                   FlexBox::vertical()
                                                          ->setCornerRadius('30px')
                                                          ->setHeight('12px')
                                                          ->setWidth('12px')
                                                          ->setBorderColor(FlexColor::hex('#6486E3'))
                                                          ->setBorderWidth(new FlexBorderWidth('2px'))
                                                          ->addContent(new FlexFiller())
                                               )
                                               ->addContent(new FlexFiller())
                                    )
                                    ->addContent(
                                        FlexText::text('Ochanomizu')
                                                ->setGravity(FlexGravity::center())
                                                ->setFlex(4)
                                                ->setSize(FlexFontSize::sm())
                                    )
                         )
                         ->addContent(
                             FlexBox::horizontal()
                                    ->setSpacing(FlexSpacing::lg())
                                    ->setHeight('64px')
                                    ->addContent(
                                        FlexBox::baseline()
                                               ->addContent(new FlexFiller())
                                               ->setFlex(1)
                                    )
                                    ->addContent(
                                        FlexBox::vertical()
                                               ->setWidth('12px')
                                               ->addContent(
                                                   FlexBox::horizontal()
                                                          ->setFlex(1)
                                                          ->addContent(new FlexFiller())
                                                          ->addContent(
                                                              FlexBox::vertical()
                                                                     ->setWidth('2px')
                                                                     ->setBackgroundColor(FlexColor::hex('#6486E3'))
                                                                     ->addContent(new FlexFiller())
                                                          )
                                                          ->addContent(new FlexFiller())
                                               )
                                    )
                                    ->addContent(
                                        FlexText::text('Metro 1hr')
                                                ->setGravity(FlexGravity::center())
                                                ->setFlex(4)
                                                ->setSize(FlexFontSize::xs())
                                                ->setColor(FlexColor::hex('#8c8c8c'))
                                    )
                         )
                         ->addContent(
                             FlexBox::horizontal()
                                    ->setSpacing(FlexSpacing::lg())
                                    ->setCornerRadius('30px')
                                    ->setMargin(FlexMargin::xl())
                                    ->addContent(
                                        FlexText::text('20:40')
                                                ->setSize(FlexFontSize::sm())
                                                ->setGravity(FlexGravity::center())
                                    )
                                    ->addContent(
                                        FlexBox::vertical()
                                               ->setFlex(0)
                                               ->addContent(new FlexFiller())
                                               ->addContent(
                                                   FlexBox::vertical()
                                                          ->setCornerRadius('30px')
                                                          ->setHeight('12px')
                                                          ->setWidth('12px')
                                                          ->setBorderColor(FlexColor::hex('#6486E3'))
                                                          ->setBorderWidth(new FlexBorderWidth('2px'))
                                                          ->addContent(new FlexFiller())
                                               )
                                               ->addContent(new FlexFiller())
                                    )
                                    ->addContent(
                                        FlexText::text('Shinjuku')
                                                ->setGravity(FlexGravity::center())
                                                ->setFlex(4)
                                                ->setSize(FlexFontSize::sm())
                                    )
                         )
              );

$configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
$assistant = ConversationAssistantFactory::create($configure);
$response  = $assistant->push(
    new ConversationFlexMessage(
        'Transit',
        $bubble
    ),
    getenv('LINE_ID')
);

if ( ! $response->isSucceeded()) {
    print_r($response->getJSONDecodedBody());
}