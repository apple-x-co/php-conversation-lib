# Sample - Apparel

![example1](./image.jpg) 

```php
$carousel = new FlexCarousel();
$carousel->addContent(
    (new FlexBubble())
        ->setBody(
            (new FlexBox())
                ->setLayout(FlexLayout::vertical())
                ->addContent(
                    (new FlexImage())
                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip1.jpg'))
                        ->setSize(FlexImageSize::full())
                        ->setAspectMode(FlexImageAspectMode::cover())
                        ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_2TO3))
                        ->setGravity(FlexGravity::top())
                )
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::vertical())
                        ->setPosition(FlexPosition::absolute())
                        ->setCornerRadius('20px')
                        ->setOffsetTop('18px')
                        ->setBackgroundColor(FlexColor::hex('#ff334b'))
                        ->setOffsetStart('18px')
                        ->setHeight('25px')
                        ->setWidth('53px')
                        ->addContent(
                            (new FlexText())
                                ->setText('SALE')
                                ->setColor(FlexColor::hex('#ffffff'))
                                ->setAlign(FlexAlign::center())
                                ->setSize(FlexFontSize::xs())
                                ->setOffsetTop('3px')
                        )
                )
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::vertical())
                        ->setPosition(FlexPosition::absolute())
                        ->setOffsetBottom('0px')
                        ->setOffsetStart('0px')
                        ->setOffsetEnd('0px')
                        ->setBackgroundColor(FlexColor::hex('#03303Acc'))
                        ->setPaddingAll('20px')
                        ->setPaddingTop('18px')
                        ->addContent(
                            (new FlexText())
                                ->setText('Brown\'s T-shirts')
                                ->setSize(FlexFontSize::xl())
                                ->setColor(FlexColor::hex('#ffffff'))
                                ->setWeight(FlexFontWeight::bold())
                        )
                        ->addContent(
                            (new FlexBox())
                                ->setLayout(FlexLayout::baseline())
                                ->setSpacing(FlexSpacing::lg())
                                ->addContent(
                                    (new FlexText())
                                        ->setText('¥35,800')
                                        ->setSize(FlexFontSize::sm())
                                        ->setColor(FlexColor::hex('#ebebeb'))
                                        ->setFlex(0)
                                )
                                ->addContent(
                                    (new FlexText())
                                        ->setText('¥75,000')
                                        ->setSize(FlexFontSize::sm())
                                        ->setColor(FlexColor::hex('#ffffffcc'))
                                        ->setFlex(0)
                                        ->setDecoration(FlexDecoration::line_through())
                                        ->setGravity(FlexGravity::bottom())
                                )
                        )
                        ->addContent(
                            (new FlexBox())
                                ->setLayout(FlexLayout::vertical())
                                ->setBorderWidth(FlexBorderWidth::light())
                                ->setCornerRadius('4px')
                                ->setSpacing(FlexSpacing::sm())
                                ->setBorderColor(FlexColor::hex('#ffffff'))
                                ->setMargin(FlexMargin::xxl())
                                ->setHeight('40px')
                                ->addContent(
                                    new FlexFiller()
                                )
                                ->addContent(
                                    (new FlexBox())
                                        ->setLayout(FlexLayout::baseline())
                                        ->setSpacing(FlexSpacing::sm())
                                        ->addContent(
                                            new FlexFiller()
                                        )
                                        ->addContent(
                                            (new FlexIcon())
                                                ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip14.png'))
                                        )
                                        ->addContent(
                                            (new FlexText())
                                                ->setText('Add to cart')
                                                ->setColor(FlexColor::hex('#ffffff'))
                                                ->setFlex(0)
                                                ->setOffsetTop('-2px')
                                        )
                                        ->addContent(
                                            new FlexFiller()
                                        )
                                )
                                ->addContent(
                                    new FlexFiller()
                                )
                        )
                )
                ->setPaddingAll('0px')
        )
);
$carousel->addContent(
    (new FlexBubble())
        ->setBody(
            (new FlexBox())
                ->setLayout(FlexLayout::vertical())
                ->addContent(
                    (new FlexImage())
                        ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip2.jpg'))
                        ->setSize(FlexImageSize::full())
                        ->setAspectMode(FlexImageAspectMode::cover())
                        ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_2TO3))
                        ->setGravity(FlexGravity::top())
                )
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::vertical())
                        ->setPosition(FlexPosition::absolute())
                        ->setCornerRadius('20px')
                        ->setOffsetTop('18px')
                        ->setBackgroundColor(FlexColor::hex('#ff334b'))
                        ->setOffsetStart('18px')
                        ->setHeight('25px')
                        ->setWidth('53px')
                        ->addContent(
                            (new FlexText())
                                ->setText('SALE')
                                ->setColor(FlexColor::hex('#ffffff'))
                                ->setAlign(FlexAlign::center())
                                ->setSize(FlexFontSize::xs())
                                ->setOffsetTop('3px')
                        )
                )
                ->addContent(
                    (new FlexBox())
                        ->setLayout(FlexLayout::vertical())
                        ->setPosition(FlexPosition::absolute())
                        ->setOffsetBottom('0px')
                        ->setOffsetStart('0px')
                        ->setOffsetEnd('0px')
                        ->setBackgroundColor(FlexColor::hex('#9C8E7Ecc'))
                        ->setPaddingAll('20px')
                        ->setPaddingTop('18px')
                        ->addContent(
                            (new FlexText())
                                ->setText('Brown\'s T-shirts')
                                ->setSize(FlexFontSize::xl())
                                ->setColor(FlexColor::hex('#ffffff'))
                                ->setWeight(FlexFontWeight::bold())
                        )
                        ->addContent(
                            (new FlexBox())
                                ->setLayout(FlexLayout::baseline())
                                ->setSpacing(FlexSpacing::lg())
                                ->addContent(
                                    (new FlexText())
                                        ->setText('¥35,800')
                                        ->setSize(FlexFontSize::sm())
                                        ->setColor(FlexColor::hex('#ebebeb'))
                                        ->setFlex(0)
                                )
                                ->addContent(
                                    (new FlexText())
                                        ->setText('¥75,000')
                                        ->setSize(FlexFontSize::sm())
                                        ->setColor(FlexColor::hex('#ffffffcc'))
                                        ->setFlex(0)
                                        ->setDecoration(FlexDecoration::line_through())
                                        ->setGravity(FlexGravity::bottom())
                                )
                        )
                        ->addContent(
                            (new FlexBox())
                                ->setLayout(FlexLayout::vertical())
                                ->setBorderWidth(FlexBorderWidth::light())
                                ->setCornerRadius('4px')
                                ->setSpacing(FlexSpacing::sm())
                                ->setBorderColor(FlexColor::hex('#ffffff'))
                                ->setMargin(FlexMargin::xxl())
                                ->setHeight('40px')
                                ->addContent(
                                    new FlexFiller()
                                )
                                ->addContent(
                                    (new FlexBox())
                                        ->setLayout(FlexLayout::baseline())
                                        ->setSpacing(FlexSpacing::sm())
                                        ->addContent(
                                            new FlexFiller()
                                        )
                                        ->addContent(
                                            (new FlexIcon())
                                                ->setUrl(new URL('https://scdn.line-apps.com/n/channel_devcenter/img/flexsnapshot/clip/clip14.png'))
                                        )
                                        ->addContent(
                                            (new FlexText())
                                                ->setText('Add to cart')
                                                ->setColor(FlexColor::hex('#ffffff'))
                                                ->setFlex(0)
                                                ->setOffsetTop('-2px')
                                        )
                                        ->addContent(
                                            new FlexFiller()
                                        )
                                )
                                ->addContent(
                                    new FlexFiller()
                                )
                        )
                )
                ->setPaddingAll('0px')
        )
);
```