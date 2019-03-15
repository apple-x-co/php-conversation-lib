<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/02
 * Time: 15:19
 */

namespace Conversation\LINE\LINEBot\MessageBuilder;



/**
 * Class FlexMessageBuilder
 *
 * SDKがアップデートするまでの暫定クラス
 *
 * @package Conversation\LINE\LINEBot\MessageBuilder
 */
class FlexMessageBuilder implements \LINE\LINEBot\MessageBuilder
{
    /** @var string */
    private $altText;

    /** @var mixed[] */
    private $contents;

    /** @var \Conversation\LINE\LINEBot\TemplateActionBuilder\QuickReplyTemplateActionBuilder[] */
    private $actionBuilders;

    /**
     * FlexMessageBuilder constructor.
     *
     * @param string $altText
     * @param mixed[] $contents
     * @param \Conversation\LINE\LINEBot\TemplateActionBuilder\QuickReplyTemplateActionBuilder[] $actionBuilders
     */
    public function __construct($altText, $contents, $actionBuilders = [])
    {
        $this->altText = $altText;
        $this->contents = $contents;
        $this->actionBuilders = $actionBuilders;
    }

    /**
     * @return array
     */
    public function buildMessage()
    {
        $message = [
            [
                'type' => 'flex',
                'altText' => $this->altText,
                'contents' => $this->contents
            ]
        ];

        if ( ! empty($this->actionBuilders)) {
            $message[0] += ['quickReply' => ['items' => []]];
            foreach ($this->actionBuilders as $action_builder) {
                $message[0]['quickReply']['items'][] = $action_builder->buildTemplateAction();
            }
        }

        return $message;
    }
}
