<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/02
 * Time: 15:30
 */

namespace Conversation\LINE\LINEBot\TemplateActionBuilder;



/**
 * Class QuickReplyTemplateActionBuilder
 *
 * SDKがアップデートするまでの暫定クラス
 *
 * @package Conversation\LINE\LINEBot\TemplateActionBuilder
 */
class QuickReplyTemplateActionBuilder implements \LINE\LINEBot\TemplateActionBuilder
{
    /** @var string */
    private $imageUrl;

    /** @var \LINE\LINEBot\TemplateActionBuilder */
    private $actionBuilder;

    /**
     * QuickReplyTemplateActionBuilder constructor.
     *
     * @param $imageUrl
     * @param $actionBuilder
     */
    public function __construct($imageUrl, $actionBuilder)
    {
        $this->imageUrl = $imageUrl;
        $this->actionBuilder = $actionBuilder;
    }

    /**
     * @return array
     */
    public function buildTemplateAction()
    {
        $action = [
            'type' => 'action',
            'action' => $this->actionBuilder->buildTemplateAction()
        ];

        if ( ! empty($this->imageUrl)) {
            $action['imageUrl'] = $this->imageUrl;
        }

        return $action;
    }
}