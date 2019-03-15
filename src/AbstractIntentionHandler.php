<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/24
 * Time: 13:26
 */

namespace Conversation;


abstract class AbstractIntentionHandler
{
    /** @var string */
    private $name;

    /** @var string */
    private $label;

    /**
     * IntentionHandlerInterface constructor.
     *
     * @param string $name
     * @param string|null $label
     */
    public function __construct($name, $label = null)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param ConversationEventHandlerContext $context
     *
     * @return AbstractConversationMessage[]
     */
    public abstract function handle($context);
}
