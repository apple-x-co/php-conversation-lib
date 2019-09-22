<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/11
 * Time: 17:04
 */

namespace Conversation;

use Conversation\ConversationAction\ConversationCameraAction;
use Conversation\ConversationAction\ConversationCameraRoleAction;
use Conversation\ConversationAction\ConversationDateTimePickerAction;
use Conversation\ConversationAction\ConversationImageMapMessageAction;
use Conversation\ConversationAction\ConversationImageMapUrlAction;
use Conversation\ConversationAction\ConversationLocationAction;
use Conversation\ConversationAction\ConversationMessageAction;
use Conversation\ConversationAction\ConversationPostbackAction;
use Conversation\ConversationAction\ConversationQuickReplyAction;
use Conversation\ConversationAction\ConversationUrlAction;
use Conversation\ConversationMenu\ConversationMenuBounds;
use Conversation\ConversationMenu\ConversationMenuSize;
use Conversation\ConversationMessage\ConversationCarouselMessage;
use Conversation\ConversationMessage\ConversationConfirmMessage;
use Conversation\ConversationMessage\ConversationFlexMessage;
use Conversation\ConversationMessage\ConversationImageCarouselMessage;
use Conversation\ConversationMessage\ConversationImageMapMessage;
use Conversation\ConversationMessage\ConversationImageMessage;
use Conversation\ConversationMessage\ConversationLocationMessage;
use Conversation\ConversationMessage\ConversationMultiMessage;
use Conversation\ConversationMessage\ConversationMultipleActionMessage;
use Conversation\ConversationMessage\ConversationStickerMessage;
use Conversation\ConversationMessage\ConversationTextMessage;
use Conversation\ConversationMessage\Flex\Component\FlexBox;
use Conversation\ConversationMessage\Flex\Component\FlexButton;
use Conversation\ConversationMessage\Flex\Component\FlexComponentInterface;
use Conversation\ConversationMessage\Flex\Component\FlexComponentType;
use Conversation\ConversationMessage\Flex\Component\FlexFiller;
use Conversation\ConversationMessage\Flex\Component\FlexIcon;
use Conversation\ConversationMessage\Flex\Component\FlexImage;
use Conversation\ConversationMessage\Flex\Component\FlexSeparator;
use Conversation\ConversationMessage\Flex\Component\FlexSpacer;
use Conversation\ConversationMessage\Flex\Component\FlexSpan;
use Conversation\ConversationMessage\Flex\Component\FlexText;
use Conversation\ConversationMessage\Flex\Container\FlexBlockStyle;
use Conversation\ConversationMessage\Flex\Container\FlexBubble;
use Conversation\ConversationMessage\Flex\Container\FlexBubbleStyle;
use Conversation\ConversationMessage\Flex\Container\FlexCarousel;
use Conversation\ConversationMessage\Flex\Property\FlexLayout;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\ConversationMessage\Flex\Property\FlexSpacing;
use Conversation\LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use Conversation\LINE\LINEBot\TemplateActionBuilder\CameraRoleTemplateActionBuilder;
use Conversation\LINE\LINEBot\TemplateActionBuilder\CameraTemplateActionBuilder;
use Conversation\LINE\LINEBot\TemplateActionBuilder\LocationTemplateActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\RichMenuBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBoundsBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuSizeBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;

class LineFacade
{
    /**
     * @param AbstractConversationMessage $message
     *
     * @return \LINE\LINEBot\MessageBuilder
     */
    public static function transformMessage($message)
    {
        $messageBuilder = null;

        if ($message->getType() === ConversationMessageType::TEXT && $message instanceof ConversationTextMessage) {
            $messageBuilder = LineFacade::generateTextMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::IMAGE && $message instanceof ConversationImageMessage) {
            $messageBuilder = LineFacade::generateImageMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::CONFIRM && $message instanceof ConversationConfirmMessage) {
            $messageBuilder = LineFacade::generateConfirmTemplateMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::MULTIPLE_ACTION && $message instanceof ConversationMultipleActionMessage) {
            $messageBuilder = LineFacade::generateButtonTemplateMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::CAROUSEL && $message instanceof ConversationCarouselMessage) {
            $messageBuilder = LineFacade::generateCarouselMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::IMAGE_CAROUSEL && $message instanceof ConversationImageCarouselMessage) {
            $messageBuilder = LineFacade::generateImageCarouselMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::STICKER && $message instanceof ConversationStickerMessage) {
            $messageBuilder = LineFacade::generateStickerMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::MULTI && $message instanceof ConversationMultiMessage) {
            $messageBuilder = LineFacade::generateMultiMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::LOCATION && $message instanceof ConversationLocationMessage) {
            $messageBuilder = LineFacade::generateLocationMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::IMAGE_MAP && $message instanceof ConversationImageMapMessage) {
            $messageBuilder = LineFacade::generateImageMapMessageBuilder($message);
        } elseif ($message->getType() === ConversationMessageType::FLEX && $message instanceof ConversationFlexMessage) {
            $messageBuilder = LineFacade::generateFlexMessageBuilder($message);
        }

        return $messageBuilder;
    }

//    /**
//     * @param ConversationTextMessage $message
//     *
//     * @return TextMessageBuilder
//     */
//    private static function generateTextMessageBuilder($message)
//    {
//        return new TextMessageBuilder($message->getText());
//    }
    /**
     * SDKがアップデートするまでの暫定クラス
     *
     * @param ConversationTextMessage $message
     *
     * @return TextMessageBuilder
     */
    private static function generateTextMessageBuilder($message)
    {
        $actions = $message->getActions();
        $action_builders = [];
        foreach ($actions as $action) {
            $actionBuilder = static::generateActionBuilder($action);
            if (is_null($actionBuilder)) {
                continue;
            }
            $action_builders[] = $actionBuilder;
        }

        $messageBuilder = new \Conversation\LINE\LINEBot\MessageBuilder\TextMessageBuilder(
            $message->getText(),
            $action_builders
        );

        return $messageBuilder;
    }

    /**
     * @param ConversationImageMessage $message
     *
     * @return ImageMessageBuilder
     */
    private static function generateImageMessageBuilder($message)
    {
        return new ImageMessageBuilder(
            $message->getOriginalURL()->getString(),
            $message->getPreviewURL()->getString()
        );
    }

    /**
     * @param ConversationConfirmMessage $message
     *
     * @return TemplateMessageBuilder
     */
    private static function generateConfirmTemplateMessageBuilder($message)
    {
        $actions = $message->getActions();
        $action_builders = [];
        foreach ($actions as $action) {
            $actionBuilder = static::generateActionBuilder($action);
            if (is_null($actionBuilder)) {
                continue;
            }
            $action_builders[] = $actionBuilder;
        }
        $confirmTemplateBuilder = new ConfirmTemplateBuilder(
            $message->getMessage(),
            $action_builders
        );

        return new TemplateMessageBuilder(
            $message->getTitle(),
            $confirmTemplateBuilder
        );
    }

    /**
     * @param ConversationMultipleActionMessage $message
     *
     * @return TemplateMessageBuilder
     */
    private static function generateButtonTemplateMessageBuilder($message)
    {
        $actions = $message->getActions();
        $action_builders = [];
        foreach ($actions as $action) {
            $actionBuilder = static::generateActionBuilder($action);
            if (is_null($actionBuilder)) {
                continue;
            }
            $action_builders[] = $actionBuilder;
        }
        $buttonTemplateBuilder = new ButtonTemplateBuilder(
            $message->getTitle(),
            $message->getMessage(),
            is_null($message->getImageUrl()) ? null : $message->getImageUrl()->getString(),
            $action_builders
        );

        return new TemplateMessageBuilder(
            $message->getTitle(),
            $buttonTemplateBuilder
        );
    }

    /**
     * @param ConversationCarouselMessage $message
     *
     * @return TemplateMessageBuilder
     */
    private static function generateCarouselMessageBuilder($message)
    {
        $columns = $message->getColumns();

        $template_builders = [];

        foreach ($columns as $column) {
            $actions         = $column->getActions();
            $action_builders = [];
            foreach ($actions as $action) {
                $actionBuilder = static::generateActionBuilder($action);
                if (is_null($actionBuilder)) {
                    continue;
                }
                $action_builders[] = $actionBuilder;
            }
            $templateBuilder     = new CarouselColumnTemplateBuilder(
                $column->getTitle(),
                $column->getMessage(),
                is_null($column->getImageUrl()) ? null : $column->getImageUrl()->getString(),
                $action_builders
            );
            $template_builders[] = $templateBuilder;
        }

        return new TemplateMessageBuilder($message->getTitle(), new CarouselTemplateBuilder($template_builders));
    }

    /**
     * @param ConversationImageCarouselMessage $message
     *
     * @return TemplateMessageBuilder
     */
    private static function generateImageCarouselMessageBuilder($message)
    {
        $template_builders = [];

        $columns = $message->getColumns();
        foreach ($columns as $column) {
            $actionBuilder       = static::generateActionBuilder($column->getAction());
            $templateBuilder     = new ImageCarouselColumnTemplateBuilder(
                is_null($column->getImageUrl()) ? null : $column->getImageUrl()->getString(),
                $actionBuilder
            );
            $template_builders[] = $templateBuilder;
        }

        return new TemplateMessageBuilder('images', new ImageCarouselTemplateBuilder($template_builders));
    }

    /**
     * @param ConversationFlexMessage $message
     *
     * @return FlexMessageBuilder
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#flex-message
     */
    private static function generateFlexMessageBuilder($message)
    {
        $contents = null;
        $container = $message->getContainer();
        if ($container instanceof FlexBubble) {
            $contents = static::generateFlexMessageBubbleContent($container);
        } elseif ($container instanceof FlexCarousel) {
            $contents = static::generateFlexMessageCarouselContent($container);
        } else {
            die('unknown container type');
        }

        $actions = $message->getActions();
        $action_builders = [];
        foreach ($actions as $action) {
            $actionBuilder = static::generateActionBuilder($action);
            if (is_null($actionBuilder)) {
                continue;
            }
            $action_builders[] = $actionBuilder;
        }

        return new FlexMessageBuilder(
            $message->getAltText(),
            $contents,
            $action_builders
        );
    }

    /**
     * @param FlexBubble $flexBubble
     *
     * @return array
     */
    private static function generateFlexMessageBubbleContent($flexBubble)
    {
        $content = ['type' => 'bubble'];

        if ($size = $flexBubble->getSize()) {
            $content += ['size' => $size->getType()];
        }
        if ($direction = $flexBubble->getDirection()) {
            $content += ['direction' => $direction->getType()];
        }
        if ($header = $flexBubble->getHeader()) {
            $content += ['header' => static::buildFlexBox($header)];
        }
        if ($hero = $flexBubble->getHero()) {
            if ($hero instanceof FlexImage) {
                $content += ['hero' => static::buildFlexImageComponent($hero)];
            } else {
                $content += ['hero' => static::buildFlexBox($hero)];
            }
        }
        if ($body = $flexBubble->getBody()) {
            $content += ['body' => static::buildFlexBox($body)];
        }
        if ($footer = $flexBubble->getFooter()) {
            $content += ['footer' => static::buildFlexBox($footer)];
        }
        if ($styles = $flexBubble->getStyles()) {
            $content += ['styles' => static::buildFlexBubbleStyles($styles)];
        }
        if (($action = $flexBubble->getAction()) && $builder = static::generateActionBuilder($action)) {
            $content += ['action' => $builder->buildTemplateAction()];
        }

        return $content;
    }

    /**
     * @param FlexBox $flexBox
     *
     * @return array
     */
    private static function buildFlexBox($flexBox)
    {
        $box = [
            'type' => 'box',
            'layout' => $flexBox->getLayout()->getType()
        ];

        if ($backgroundColor = $flexBox->getBackgroundColor()) {
            $box += ['backgroundColor' => $backgroundColor->getType()];
        }
        if ($borderColor = $flexBox->getBorderColor()) {
            $box += ['borderColor' => $borderColor->getType()];
        }
        if ($borderWidth = $flexBox->getBorderWidth()) {
            $box += ['borderWidth' => $borderWidth->getType()];
        }
        if ($cornerRadius = $flexBox->getCornerRadius()) {
            $box += ['cornerRadius' => $cornerRadius];
        }
        if ($width = $flexBox->getWidth()) {
            $box += ['width' => $width];
        }
        if ($height = $flexBox->getHeight()) {
            $box += ['height' => $height];
        }
        if ($cornerRadius = $flexBox->getCornerRadius()) {
            $box += ['cornerRadius' => $cornerRadius];
        }
        if ($contents = static::buildFlexComponents($flexBox->getContents())) {
            $box += ['contents' => $contents];
        }
        $flex = $flexBox->getFlex();
        if ($flex !== '' && $flex !== null) {
            $box += ['flex' => $flex];
        }
        if ($flexSpacing = $flexBox->getSpacing()) {
            $box += ['spacing' => $flexSpacing->getType()];
        }
        if ($flexMargin = $flexBox->getMargin()) {
            $box += ['margin' => $flexMargin->getType()];
        }
        if ($paddingAll = $flexBox->getPaddingAll()) {
            $box += ['paddingAll' => $paddingAll];
        }
        if ($paddingTop = $flexBox->getPaddingTop()) {
            $box += ['paddingTop' => $paddingTop];
        }
        if ($paddingBottom = $flexBox->getPaddingBottom()) {
            $box += ['paddingBottom' => $paddingBottom];
        }
        if ($paddingStart = $flexBox->getPaddingStart()) {
            $box += ['paddingStart' => $paddingStart];
        }
        if ($paddingEnd = $flexBox->getPaddingEnd()) {
            $box += ['paddingEnd' => $paddingEnd];
        }
        if ($position = $flexBox->getPosition()) {
            $box += ['position' => $position->getType()];
        }
        if ($offsetTop = $flexBox->getOffsetTop()) {
            $box += ['offsetTop' => $offsetTop];
        }
        if ($offsetBottom = $flexBox->getOffsetBottom()) {
            $box += ['offsetBottom' => $offsetBottom];
        }
        if ($offsetStart = $flexBox->getOffsetStart()) {
            $box += ['offsetStart' => $offsetStart];
        }
        if ($offsetEnd = $flexBox->getOffsetEnd()) {
            $box += ['offsetEnd' => $offsetEnd];
        }
        if ($action = $flexBox->getAction()) {
            $box += ['action' => static::generateActionBuilder($action)->buildTemplateAction()];
        }

        return $box;
    }

    /**
     * @param FlexBubbleStyle $flexBubbleStyle
     *
     * @return array
     */
    private static function buildFlexBubbleStyles($flexBubbleStyle)
    {
        $content = [];

        if ($header = $flexBubbleStyle->getHeader()) {
            $content += ['header' => static::buildFlexBlockStyles($header)];
        }
        if ($hero = $flexBubbleStyle->getHero()) {
            $content += ['hero' => static::buildFlexBlockStyles($hero)];
        }
        if ($body = $flexBubbleStyle->getBody()) {
            $content += ['body' => static::buildFlexBlockStyles($body)];
        }
        if ($footer = $flexBubbleStyle->getFooter()) {
            $content += ['footer' => static::buildFlexBlockStyles($footer)];
        }

        return empty($content) ? null : $content;
    }

    /**
     * @param FlexBlockStyle $flexBlockStyles
     *
     * @return array
     */
    private static function buildFlexBlockStyles($flexBlockStyles)
    {
        $content = [];

        if ($backgroundColor = $flexBlockStyles->getBackgroundColor()) {
            $content += ['backgroundColor' => $backgroundColor->getType()];
        }
        if ($is_separator = $flexBlockStyles->isSeparator()) {
            $content += ['separator' => $is_separator];
        }
        if ($separatorColor = $flexBlockStyles->getSeparatorColor()) {
            $content += ['separatorColor' => $separatorColor->getType()];
        }

        return empty($content) ? null : $content;
    }

    /**
     * @param FlexComponentInterface[] $flexComponents
     *
     * @return array|null
     */
    private static function buildFlexComponents($flexComponents)
    {
        $contents = [];

        if (empty($flexComponents) || ! is_array($flexComponents)) {
            return $contents;
        }

        foreach ($flexComponents as $flexComponent) {
            if ($flexComponent->getComponentType()->getType() == FlexComponentType::BOX &&
                $flexComponent instanceof FlexBox) {
                $contents[] = static::buildFlexBox($flexComponent);
            } elseif ($flexComponent->getComponentType()->getType() == FlexComponentType::TEXT &&
                $flexComponent instanceof FlexText) {
                $contents[] = static::buildFlexTextComponent($flexComponent);
            } elseif ($flexComponent->getComponentType()->getType() == FlexComponentType::IMAGE &&
                      $flexComponent instanceof FlexImage) {
                $contents[] = static::buildFlexImageComponent($flexComponent);
            } elseif ($flexComponent->getComponentType()->getType() == FlexComponentType::BUTTON &&
                      $flexComponent instanceof FlexButton) {
                $contents[] = static::buildFlexButtonComponent($flexComponent);
            } elseif ($flexComponent->getComponentType()->getType() == FlexComponentType::FILLER &&
                      $flexComponent instanceof FlexFiller) {
                $contents[] = static::buildFlexFillerComponent($flexComponent);
            } elseif ($flexComponent->getComponentType()->getType() == FlexComponentType::ICON &&
                      $flexComponent instanceof FlexIcon) {
                $contents[] = static::buildFlexIconComponent($flexComponent);
            } elseif ($flexComponent->getComponentType()->getType() == FlexComponentType::SEPARATOR &&
                      $flexComponent instanceof FlexSeparator) {
                $contents[] = static::buildFlexSeparatorComponent($flexComponent);
            } elseif ($flexComponent->getComponentType()->getType() == FlexComponentType::SPACER &&
                      $flexComponent instanceof FlexSpacer) {
                $contents[] = static::buildFlexSpacerComponent($flexComponent);
            }
        }

        return $contents;
    }

    /**
     * @param FlexComponentInterface|FlexText $flexComponent
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#f-text
     */
    private static function buildFlexTextComponent($flexComponent)
    {
        $content = ['type' => 'text'];

        if ($text = $flexComponent->getText()) {
            $content += ['text' => (string)$text];
        }
        if ($spanComponents = $flexComponent->getContents()) {
            $spans = [];
            foreach ($spanComponents as $spanComponent) {
                $spans[] = static::buildFlexSpanComponent($spanComponent);
            }
            $content += ['contents' => $spans];
        }
        $flex = $flexComponent->getFlex();
        if ($flex !== '' && $flex !== null) {
            $content += ['flex' => $flex];
        }
        if ($margin = $flexComponent->getMargin()) {
            $content += ['margin' => $margin->getType()];
        }
        if ($position = $flexComponent->getPosition()) {
            $content += ['position' => $position->getType()];
        }
        if ($offsetTop = $flexComponent->getOffsetTop()) {
            $content += ['offsetTop' => $offsetTop];
        }
        if ($offsetBottom = $flexComponent->getOffsetBottom()) {
            $content += ['offsetBottom' => $offsetBottom];
        }
        if ($offsetStart = $flexComponent->getOffsetStart()) {
            $content += ['offsetStart' => $offsetStart];
        }
        if ($offsetEnd = $flexComponent->getOffsetEnd()) {
            $content += ['offsetEnd' => $offsetEnd];
        }
        if ($size = $flexComponent->getSize()) {
            $content += ['size' => $size->getType()];
        }
        if ($align = $flexComponent->getAlign()) {
            $content += ['align' => $align->getType()];
        }
        if ($gravity = $flexComponent->getGravity()) {
            $content += ['gravity' => $gravity->getType()];
        }
        if ($wrap = $flexComponent->isWrap()) {
            $content += ['wrap' => $wrap];
        }
        if ($maxLines = $flexComponent->getMaxLines()) {
            $content += ['maxLines' => $maxLines];
        }
        if ($weight = $flexComponent->getWeight()) {
            $content += ['weight' => $weight->getType()];
        }
        if ($color = $flexComponent->getColor()) {
            $content += ['color' => $color->getType()];
        }
        if ($action = $flexComponent->getAction()) {
            $content += ['action' => static::generateActionBuilder($action)->buildTemplateAction()];
        }
        if ($style = $flexComponent->getStyle()) {
            $content += ['style' => $style->getType()];
        }
        if ($decoration = $flexComponent->getDecoration()) {
            $content += ['decoration' => $decoration->getType()];
        }

        return $content;
    }

    /**
     * @param FlexComponentInterface|FlexSpan $flexComponent
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#f-text
     */
    private static function buildFlexSpanComponent($flexComponent)
    {
        $content = ['type' => 'span'];

        if ($text = $flexComponent->getText()) {
            $content += ['text' => (string)$text];
        }
        if ($color = $flexComponent->getColor()) {
            $content += ['color' => $color->getType()];
        }
        if ($size = $flexComponent->getSize()) {
            $content += ['size' => $size->getType()];
        }
        if ($weight = $flexComponent->getWeight()) {
            $content += ['weight' => $weight->getType()];
        }
        if ($style = $flexComponent->getStyle()) {
            $content += ['style' => $style->getType()];
        }
        if ($decoration = $flexComponent->getDecoration()) {
            $content += ['decoration' => $decoration->getType()];
        }

        return $content;
    }

    /**
     * @param FlexImage $flexImage
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#f-image
     */
    private static function buildFlexImageComponent($flexImage)
    {
        $content = [
            'type' => 'image',
            'url' => $flexImage->getUrl()->getString()
        ];

        $flex = $flexImage->getFlex();
        if ($flex !== '' && $flex !== null) {
            $content += ['flex' => $flex];
        }
        if ($margin = $flexImage->getMargin()) {
            $content += ['margin' => $margin->getType()];
        }
        if ($align = $flexImage->getAlign()) {
            $content += ['align' => $align->getType()];
        }
        if ($gravity = $flexImage->getGravity()) {
            $content += ['gravity' => $gravity->getType()];
        }
        if ($size = $flexImage->getSize()) {
            $content += ['size' => $size->getType()];
        }
        if ($aspectRatio = $flexImage->getAspectRatio()) {
            $content += ['aspectRatio' => $aspectRatio->getType()];
        }
        if ($aspectMode = $flexImage->getAspectMode()) {
            $content += ['aspectMode' => $aspectMode->getType()];
        }
        if ($backgroundColor = $flexImage->getBackgroundColor()) {
            $content += ['backgroundColor' => $backgroundColor->getType()];
        }
        if ($action = $flexImage->getAction()) {
            $content += ['action' => static::generateActionBuilder($action)->buildTemplateAction()];
        }

        return $content;
    }

    /**
     * @param FlexButton $flexButton
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#button
     */
    private static function buildFlexButtonComponent($flexButton)
    {
        $content = [
            'type' => 'button',
            'action' => static::generateActionBuilder($flexButton->getAction())->buildTemplateAction()
        ];

        $flex = $flexButton->getFlex();
        if ($flex !== '' && $flex !== null) {
            $content += ['flex' => $flex];
        }
        if ($margin = $flexButton->getMargin()) {
            $content += ['margin' => $margin->getType()];
        }
        if ($height = $flexButton->getHeight()) {
            $content += ['height' => $height->getType()];
        }
        if ($style = $flexButton->getStyle()) {
            $content += ['style' => $style->getType()];
        }
        if ($color = $flexButton->getColor()) {
            $content += ['color' => $color->getType()];
        }
        if ($gravity = $flexButton->getGravity()) {
            $content += ['gravity' => $gravity->getType()];
        }

        return $content;
    }

    /**
     * @param FlexFiller $flexFiller
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#filler
     */
    private static function buildFlexFillerComponent($flexFiller)
    {
        return [
            'type' => 'filler'
        ];
    }

    /**
     * @param FlexIcon $flexIcon
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#icon
     */
    private static function buildFlexIconComponent($flexIcon)
    {
        $content = [
            'type' => 'icon',
            'url' => $flexIcon->getUrl()->getString()
        ];

        if ($margin = $flexIcon->getMargin()) {
            $content += ['margin' => $margin->getType()];
        }
        if ($size = $flexIcon->getSize()) {
            $content += ['size' => $size->getType()];
        }
        if ($aspectRatio = $flexIcon->getAspectRatio()) {
            $content += ['aspectRatio' => $aspectRatio->getType()];
        }

        return$content;
    }

    /**
     * @param FlexSeparator $flexSeparator
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#separator
     */
    private static function buildFlexSeparatorComponent($flexSeparator)
    {
        $content = [
            'type' => 'separator'
        ];

        if ($margin = $flexSeparator->getMargin()) {
            $content += ['margin' => $margin->getType()];
        }
        if ($color = $flexSeparator->getColor()) {
            $content += ['color' => $color->getType()];
        }

        return$content;
    }

    /**
     * @param FlexSpacer $flexSpacer
     *
     * @return array
     *
     * @see https://developers.line.me/ja/reference/messaging-api/#spacer
     */
    private static function buildFlexSpacerComponent($flexSpacer)
    {
        $content = [
            'type' => 'spacer'
        ];

        if ($size = $flexSpacer->getSize()) {
            $content += ['size' => $size->getType()];
        }

        return$content;
    }

    /**
     * @param FlexCarousel $carousel
     *
     * @return array
     */
    private static function generateFlexMessageCarouselContent($carousel)
    {
        $contents = [];

        $bubbles = $carousel->getContents();
        foreach ($bubbles as $bubble) {
            $contents[] = static::generateFlexMessageBubbleContent($bubble);
        }

        return [
            'type' => 'carousel',
            'contents' => $contents
        ];
    }

    /**
     * @param AbstractConversationAction $action
     *
     * @return TemplateActionBuilder|null
     */
    private static function generateActionBuilder($action)
    {
        if ($action instanceof ConversationMessageAction) {
            return new MessageTemplateActionBuilder(
                $action->getLabel(),
                $action->getText()
            );
        } elseif ($action instanceof ConversationPostbackAction) {
            return new PostbackTemplateActionBuilder(
                $action->getLabel(),
                $action->getData(),
                $action->getText()
            );
        } elseif ($action instanceof ConversationUrlAction) {
            return new UriTemplateActionBuilder(
                $action->getLabel(),
                is_null($action->getUrl()) ? null : $action->getUrl()->getString()
            );
        } elseif ($action instanceof ConversationDateTimePickerAction) {
            return new DatetimePickerTemplateActionBuilder(
                $action->getLabel(),
                $action->getData(),
                $action->getMode(),
                $action->getMax(),
                $action->getMin()
            );
        } elseif ($action instanceof ConversationCameraAction) {
            return new CameraTemplateActionBuilder(
                $action->getLabel()
            );
        } elseif ($action instanceof ConversationCameraRoleAction) {
            return new CameraRoleTemplateActionBuilder(
                $action->getLabel()
            );
        } elseif ($action instanceof ConversationLocationAction) {
            return new LocationTemplateActionBuilder(
                $action->getLabel()
            );
        } elseif ($action instanceof ConversationQuickReplyAction) {
            // SDKがアップデートするまでの暫定クラス
            return new \Conversation\LINE\LINEBot\TemplateActionBuilder\QuickReplyTemplateActionBuilder(
                is_null($action->getURL()) ? null : $action->getURL()->getString(),
                static::generateActionBuilder($action->getAction())
            );
        }

        return null;
    }

    /**
     * @param ConversationStickerMessage $message
     *
     * @return StickerMessageBuilder
     */
    private static function generateStickerMessageBuilder($message)
    {
        return new StickerMessageBuilder($message->getPackageId(), $message->getStickerId());
    }

    /**
     * @param ConversationMultiMessage $multi_message
     *
     * @return MultiMessageBuilder
     */
    private static function generateMultiMessageBuilder($multi_message)
    {
        $messages = $multi_message->getMessages();

        $multiMessageBuilder = new MultiMessageBuilder();

        foreach ($messages as $message) {
            $messageBuilder = null;
            if ($message->getType() === ConversationMessageType::TEXT && $message instanceof ConversationTextMessage) {
                $messageBuilder = static::generateTextMessageBuilder($message);
            } elseif ($message->getType() === ConversationMessageType::IMAGE && $message instanceof ConversationImageMessage) {
                $messageBuilder = static::generateImageMessageBuilder($message);
            } elseif ($message->getType() === ConversationMessageType::CONFIRM && $message instanceof ConversationConfirmMessage) {
                $messageBuilder = static::generateConfirmTemplateMessageBuilder($message);
            } elseif ($message->getType() === ConversationMessageType::MULTIPLE_ACTION && $message instanceof ConversationMultipleActionMessage) {
                $messageBuilder = static::generateButtonTemplateMessageBuilder($message);
            } elseif ($message->getType() === ConversationMessageType::CAROUSEL && $message instanceof ConversationCarouselMessage) {
                $messageBuilder = static::generateCarouselMessageBuilder($message);
            } elseif ($message->getType() === ConversationMessageType::STICKER && $message instanceof ConversationStickerMessage) {
                $messageBuilder = static::generateStickerMessageBuilder($message);
            } elseif ($message->getType() === ConversationMessageType::LOCATION && $message instanceof ConversationLocationMessage) {
                $messageBuilder = static::generateLocationMessageBuilder($message);
            } elseif ($message->getType() === ConversationMessageType::FLEX && $message instanceof ConversationFlexMessage) {
                $messageBuilder = static::generateFlexMessageBuilder($message);
            }
            if (is_null($messageBuilder)) {
                continue;
            }

            $multiMessageBuilder->add($messageBuilder);
        }

        return $multiMessageBuilder;
    }

    /**
     * @param ConversationLocationMessage $location_message
     *
     * @return LocationMessageBuilder
     */
    private static function generateLocationMessageBuilder($location_message)
    {
        return new LocationMessageBuilder(
            $location_message->getTitle(),
            $location_message->getAddress(),
            $location_message->getLatitude(),
            $location_message->getLongitude()
        );
    }

    /**
     * @param ConversationImageMapMessage $message
     *
     * @return ImagemapMessageBuilder
     */
    private static function generateImageMapMessageBuilder($message)
    {
        $size    = $message->getSize();
        $actions = $message->getActions();

        $imagemap_action_builders = [];
        foreach ($actions as $action) {
            $imagemap_action_builders[] = static::generateImageMapActionBuilder($action);
        }

        return new ImagemapMessageBuilder(
            $message->getImageURL()->getString(),
            $message->getTitle(),
            new BaseSizeBuilder($size->getWidth(), $size->getHeight()),
            $imagemap_action_builders
        );
    }

    /**
     * @param AbstractConversationAction $action
     *
     * @return ImagemapActionBuilder|null
     */
    private static function generateImageMapActionBuilder($action)
    {
        if ($action instanceof ConversationImageMapMessageAction) {
            $area = $action->getArea();

            return new ImagemapMessageActionBuilder(
                $action->getText(),
                new AreaBuilder(
                    $area->getX(),
                    $area->getY(),
                    $area->getWidht(),
                    $area->getHeight()
                )
            );
        } elseif ($action instanceof ConversationImageMapUrlAction) {
            $area = $action->getArea();

            return new ImagemapUriActionBuilder(
                $action->getURL()->getString(),
                new AreaBuilder(
                    $area->getX(),
                    $area->getY(),
                    $area->getWidht(),
                    $area->getHeight()
                )
            );
        }

        return null;
    }

    /**
     * @param ConversationMenu $menu
     *
     * @return \LINE\LINEBot\RichMenuBuilder
     */
    public static function transformMenu($menu)
    {
        $areaBuilder = [];
        foreach ($menu->getAreas() as $area) {
            $areaBuilder[] = new RichMenuAreaBuilder(
                static::generateRichMenuAreaBoundsBuilder($area->getBounds()),
                static::generateActionBuilder($area->getAction())
            );
        }

        return new RichMenuBuilder(
            static::generateRichMenuSizeBuilder($menu->getSize()),
            $menu->isDefault(),
            $menu->getName(),
            $menu->getLabel(),
            $areaBuilder
        );
    }

    /**
     * @param ConversationMenuBounds $bounds
     *
     * @return RichMenuAreaBoundsBuilder
     */
    private static function generateRichMenuAreaBoundsBuilder($bounds)
    {
        return new RichMenuAreaBoundsBuilder(
            $bounds->getX(),
            $bounds->getY(),
            $bounds->getWidth(),
            $bounds->getHeight()
        );
    }

    /**
     * @param ConversationMenuSize $size
     *
     * @return RichMenuSizeBuilder
     */
    private static function generateRichMenuSizeBuilder($size)
    {
        return new RichMenuSizeBuilder(
            $size->getHeight(),
            $size->getWidth()
        );
    }

    /**
     * @param int $hex_code
     *
     * @return string
     */
    public static function encodeEmoji($hex_code)
    {
        $binary_string = hex2bin(str_repeat('0', 8 - strlen($hex_code)) . $hex_code);
        $emoji         = mb_convert_encoding($binary_string, 'UTF-8', 'UTF-32BE');

        return $emoji;
    }
}
