<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/24
 * Time: 13:26
 */

namespace Conversation;


class IntentionGroup
{
    /** @var string */
    private $id;

    /** @var AbstractIntentionHandler[]  */
    private $intentions;

    /** @var string|null */
    private $label;

    /**
     * IntentionGroup constructor.
     *
     * @param string $id
     * @param AbstractIntentionHandler[] $intentions
     * @param string $label
     */
    public function __construct($id, $intentions, $label = null)
    {
        $this->id         = $id;
        $this->intentions = $intentions;
        $this->label      = $label;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return AbstractIntentionHandler[]
     */
    public function getIntentions()
    {
        return $this->intentions;
    }

    /**
     * @return null|string
     */
    public function getLabel()
    {
        return $this->label;
    }
}