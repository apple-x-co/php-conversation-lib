# Sample - Shopping

![restaurant](./image.jpg) 

```php
$bubble = new FlexBubble();
$bubble
    ->setHero(
        FlexImage::image('https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png')
                 ->setSize(new FlexImageSize(FlexImageSize::FULL))
                 ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_20TO13))
                 ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
    )
    ->setBody(
        FlexBox::vertical()
               ->setSpacing(FlexSpacing::sm())
               ->addContent(
                   FlexText::text('Arm Chair, White')
                           ->setWrap(true)
                           ->setWeight(FlexFontWeight::bold())
                           ->setSize(FlexFontSize::xl())
               )
               ->addContent(
                   FlexBox::baseline()
                          ->addContent(
                              FlexText::text('$49')
                                      ->setWrap(true)
                                      ->setWeight(FlexFontWeight::bold())
                                      ->setSize(FlexFontSize::xl())
                                      ->setFlex(0)
                          )
                          ->addContent(
                              FlexText::text('.99')
                                      ->setWrap(true)
                                      ->setWeight(FlexFontWeight::bold())
                                      ->setSize(FlexFontSize::sm())
                                      ->setFlex(0)
                          )
               )
    )
    ->setFooter(
        FlexBox::vertical()
               ->setSpacing(FlexSpacing::sm())
               ->addContent(
                   FlexButton::primary()
                             ->setAction(new ConversationUrlAction('Add to Cart', new URI('https://linecorp.com')))
               )
               ->addContent(
                   FlexButton::link()
                             ->setAction(new ConversationUrlAction('Add to wishlist', new URI('https://linecorp.com')))
               )
    );

$bubble2 = new FlexBubble();
$bubble2
    ->setHero(
        FlexImage::image('https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png')
                 ->setSize(new FlexImageSize(FlexImageSize::FULL))
                 ->setAspectRatio(new FlexImageAspectRatio(FlexImageAspectRatio::ASPECT_20TO13))
                 ->setAspectMode(new FlexImageAspectMode(FlexImageAspectMode::MODE_COVER))
    )
    ->setBody(
        FlexBox::vertical()
               ->setSpacing(FlexSpacing::sm())
               ->addContent(
                   FlexText::text('Metal Desk Lamp')
                           ->setWrap(true)
                           ->setWeight(FlexFontWeight::bold())
                           ->setSize(FlexFontSize::xl())
               )
               ->addContent(
                   FlexBox::baseline()
                          ->addContent(
                              FlexText::text('$11')
                                      ->setWrap(true)
                                      ->setWeight(FlexFontWeight::bold())
                                      ->setSize(FlexFontSize::xl())
                                      ->setFlex(0)
                          )
                          ->addContent(
                              FlexText::text('.99')
                                      ->setWrap(true)
                                      ->setWeight(FlexFontWeight::bold())
                                      ->setSize(FlexFontSize::sm())
                                      ->setFlex(0)
                          )
               )
               ->addContent(
                   FlexText::text('Temporarily out of stock')
                           ->setWrap(true)
                           ->setSize(FlexFontSize::xs())
                           ->setMargin(FlexMargin::md())
                           ->setColor(FlexColor::hex('#ff5551'))
                           ->setFlex(0)
               )
    )
    ->setFooter(
        FlexBox::vertical()
               ->setSpacing(FlexSpacing::sm())
               ->addContent(
                   FlexButton::primary()
                             ->setColor(FlexColor::hex('#aaaaaa'))
                             ->setAction(new ConversationUrlAction('Add to Cart', new URI('https://linecorp.com')))
               )
               ->addContent(
                   FlexButton::link()
                             ->setAction(new ConversationUrlAction('Add to wishlist', new URI('https://linecorp.com')))
               )
    );

$bubble3 = new FlexBubble();
$bubble3
    ->setBody(
        FlexBox::vertical()
               ->setSpacing(FlexSpacing::sm())
               ->addContent(
                   FlexButton::link()
                             ->setFlex(1)
                             ->setGravity(FlexGravity::center())
                             ->setAction(new ConversationUrlAction('See more', new URI('https://linecorp.com')))
               )
    );

$carousel = new FlexCarousel();
$carousel->addContent($bubble);
$carousel->addContent($bubble2);
$carousel->addContent($bubble3);
```