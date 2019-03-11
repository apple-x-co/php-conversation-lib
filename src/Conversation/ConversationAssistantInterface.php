<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:29
 */

namespace Conversation;


use Conversation\HTTP\Response;

interface ConversationAssistantInterface
{
    /**
     * ConversationAssistantInterface constructor.
     *
     * @param Configure $configure
     */
    public function __construct($configure);

    /**
     * @return Configure
     */
    public function getConfigure();

    /**
     * @return mixed
     */
    public function core();

    /**
     * @param string $push_id
     *
     * @return void
     */
    public function hello($push_id);

    /**
     * @return AbstractConversationEvent[]
     */
    public function take();

    /**
     * @param AbstractConversationMessage $message
     * @param string $reply_token
     *
     * @return Response
     */
    public function say($message, $reply_token);

    /**
     * @param AbstractConversationMessage $message
     * @param string $push_id
     *
     * @return Response
     */
    public function push($message, $push_id);

    /**
     * @param AbstractConversationMessage $message
     * @param string $push_ids
     *
     * @return Response
     */
    public function multicast($message, $push_ids);

    /**
     * @param string $user_id
     *
     * @return Profile
     */
    public function getProfile($user_id);

    /**
     * Native api call
     *
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function call($callback);
}
