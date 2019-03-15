<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/02
 * Time: 13:13
 */

namespace Conversation;


use Conversation\Exception\ConversationException;

class URI
{
    /** @var string */
    protected $string;

    /** @var string */
    protected $query_string;

    /**
     * URI constructor.
     *
     * @param string $string
     * @param string|null $query_string
     */
    public function __construct($string, $query_string = null)
    {
        if ( ! preg_match('#\w+://#', $string)) {
            throw new ConversationException();
        }

        $this->string = $string;
        $this->query_string = $query_string;
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->string . (is_null($this->query_string) ? '' : '?' . $this->query_string);
    }

    /**
     * @param string $query_string
     */
    public function setQueryString($query_string)
    {
        $this->query_string = $query_string;
    }

    public function __debugInfo()
    {
        return [
            'url' => $this->string,
            'query_string' => $this->query_string
        ];
    }
}
