<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/08
 * Time: 12:22
 */

namespace Conversation\ConversationEvent;

use Conversation\AbstractConversationEvent;
use Conversation\ConversationEventType;
use Conversation\Exception\ConversationPostbackEventMissingArgumentException;

class ConversationPostbackEvent extends AbstractConversationEvent
{
    private $queries = null;

    public function __construct($content)
    {
        if ( ! (is_array($content))) {
            throw new ConversationPostbackEventMissingArgumentException();
        }

        parent::__construct(ConversationEventType::POSTBACK, $content);
    }

    /**
     * @return string
     */
    public function getData()
    {
        $content = $this->getContent();

        return $content['data'];
    }

    /**
     * @param null $name
     *
     * @return array|mixed|null
     */
    public function getQuery($name = null)
    {
        if (is_null($this->queries)) {
            $data = $this->getData();
            $this->queries = [];
            if ( ! empty($data)) {
                parse_str($data, $this->queries);
            }
        }

        if (is_null($name)) {
            return $this->queries;
        }

        if (array_key_exists($name, $this->queries)) {
            return $this->queries[$name];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        $content = $this->getContent();

        return $content['params'];
    }
}