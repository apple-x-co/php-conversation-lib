<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/02
 * Time: 15:19
 */

namespace Conversation\LINE\LINEBot\MessageBuilder;



/**
 * Class TextMessageBuilder
 *
 * SDKがアップデートするまでの暫定クラス
 *
 * @package Conversation\LINE\LINEBot\MessageBuilder
 */
class TextMessageBuilder extends \LINE\LINEBot\MessageBuilder\TextMessageBuilder
{
    /** @var \Conversation\LINE\LINEBot\TemplateActionBuilder\QuickReplyTemplateActionBuilder[] */
    private $actionBuilders;

    /**
     * TextMessageBuilder constructor.
     *
     * @param $text
     * @param \Conversation\LINE\LINEBot\TemplateActionBuilder\QuickReplyTemplateActionBuilder[] $actionBuilders
     */
    public function __construct($text, $actionBuilders = [])
    {
        parent::__construct($text, null);

        $this->actionBuilders = $actionBuilders;
    }
    /**
     * @return array
     */
    public function buildMessage()
    {
        $message = parent::buildMessage();

        if ( ! empty($this->actionBuilders)) {
            $message[0] += ['quickReply' => ['items' => []]];
            foreach ($this->actionBuilders as $action_builder) {
                $message[0]['quickReply']['items'][] = $action_builder->buildTemplateAction();
            }
        }

        return $message;
    }
}