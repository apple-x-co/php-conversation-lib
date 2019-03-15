<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/11
 * Time: 11:44
 */

namespace Conversation\ConversationAction;


use Conversation\AbstractConversationAction;
use Conversation\ConversationActionType;

class ConversationDateTimePickerAction extends AbstractConversationAction
{
    /** @var string */
    private $label;

    /** @var string */
    private $data;

    /** @var string */
    private $mode;

    /** @var string */
    private $initial;

    /** @var string */
    private $max;

    /** @var string */
    private $min;

    /**
     * ConversationDateTimePickerAction constructor.
     *
     * @param $label
     * @param $data
     * @param $mode
     * @param null $initial
     * @param null $max
     * @param null $min
     */
    public function __construct($label, $data, $mode, $initial = null, $max = null, $min = null)
    {
        $this->label = $label;
        $this->data = $data;
        $this->mode = $mode;
        $this->initial = $initial;
        $this->max = $max;
        $this->min = $min;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ConversationActionType::DATETIME_PICKER;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @return null|string
     */
    public function getInitial()
    {
        return $this->initial;
    }

    /**
     * @return null|string
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return null|string
     */
    public function getMin()
    {
        return $this->min;
    }
}