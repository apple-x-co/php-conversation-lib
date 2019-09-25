# Sample - News

![news](./image.jpg) 

```php
$bubble = new FlexBubble();
$bubble
    ->setHeader(
        (new FlexBox())
            ->addContent(
                (new FlexText())
                    ->setText('NEWS DIGEST')
                    ->setWeight(new FlexFontWeight(FlexFontWeight::BOLD))
                    ->setColor(new FlexColor('#aaaaaa'))
                    ->setSize(new FlexFontSize(FlexFontSize::SM))
            )
    )
    ->setHero(
        (new FlexImage())
            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_4_news.png'))
            ->setSize(new FlexImageSize(FlexImageSize::FULL))
            ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_20TO13))
            ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
            ->setAction(
                new ConversationUrlAction('OPEN', new URL('http://linecorp.com/'))
            )
    )
    ->setBody(
        (new FlexBox())
            ->setSpacing(new FlexSpacing(FlexSpacing::MD))
            ->addContent(
                (new FlexBox())
                    ->setLayout(new FlexLayout(FlexLayout::VERTICAL))
                    ->setFlex(1)
                    ->addContent(
                        (new FlexImage())
                            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/02_1_news_thumbnail_1.png'))
                            ->setSize(new FlexImageSize(FlexImageSize::SM))
                            ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_4TO3))
                            ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
                            ->setGravity(new FlexGravity(FlexGravity::BOTTOM))
                    )
                    ->addContent(
                        (new FlexImage())
                            ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/fx/02_1_news_thumbnail_2.png'))
                            ->setMargin(new FlexMargin(FlexMargin::MD))
                            ->setSize(new FlexImageSize(FlexImageSize::SM))
                            ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_4TO3))
                            ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
                    )
            )
            ->addContent(
                (new FlexBox())
                    ->setLayout(new FlexLayout(FlexLayout::VERTICAL))
                    ->setFlex(2)
                    ->addContent(
                        (new FlexText())
                            ->setText('7 Things to Know for Today')
                            ->setGravity(new FlexGravity(FlexGravity::TOP))
                            ->setSize(new FlexFontSize(FlexFontSize::XS))
                            ->setFlex(2)
                    )
                    ->addContent(
                        (new FlexSeparator())
                    )
                    ->addContent(
                        (new FlexText())
                            ->setText('Hay fever goes wild')
                            ->setGravity(new FlexGravity(FlexGravity::CENTER))
                            ->setSize(new FlexFontSize(FlexFontSize::XS))
                            ->setFlex(2)
                    )
                    ->addContent(
                        (new FlexSeparator())
                    )
                    ->addContent(
                        (new FlexText())
                            ->setText('LINE Pay Begins Barcode Payment Service')
                            ->setGravity(new FlexGravity(FlexGravity::CENTER))
                            ->setSize(new FlexFontSize(FlexFontSize::XS))
                            ->setFlex(2)
                    )
                    ->addContent(
                        (new FlexSeparator())
                    )
                    ->addContent(
                        (new FlexText())
                            ->setText('LINE Adds LINE Wallet')
                            ->setGravity(new FlexGravity(FlexGravity::BOTTOM))
                            ->setSize(new FlexFontSize(FlexFontSize::XS))
                            ->setFlex(2)
                    )
            )
    )
    ->setFooter(
        (new FlexBox())
            ->addContent(
                (new FlexButton())
                    ->setAction(
                        new ConversationUrlAction('OPEN', new URL('http://linecorp.com/'))
                    )
            )
    );
```