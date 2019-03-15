<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/12
 * Time: 12:51
 */

namespace Conversation;


use Conversation\Exception\ConversationException;

class URL extends URI
{
    /**
     * URL constructor.
     *
     * @param string $string
     * @param string|null $query_string
     */
    public function __construct($string, $query_string = null)
    {
        if ( ! preg_match('#http(s)?://#', $string)) {
            throw new ConversationException();
        }

        parent::__construct($string, $query_string);
    }
}
