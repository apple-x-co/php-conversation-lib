# Sample - Restaurant

![example1](./image.jpg) 

```php
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
```