<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/02
 * Time: 15:30
 */

namespace Conversation\LINE\LINEBot\TemplateActionBuilder;



/**
 * Class CameraTemplateActionBuilder
 *
 * SDKがアップデートするまでの暫定クラス
 *
 * @package Conversation\LINE\LINEBot\TemplateActionBuilder
 */
class CameraTemplateActionBuilder implements \LINE\LINEBot\TemplateActionBuilder
{
    /** @var string */
    private $label;

    /**
     * CameraTemplateActionBuilder constructor.
     *
     * @param string $label
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * @return array
     */
    public function buildTemplateAction()
    {
        $action = [
            'type' => 'camera',
            'label' => $this->label
        ];

        return $action;
    }
}