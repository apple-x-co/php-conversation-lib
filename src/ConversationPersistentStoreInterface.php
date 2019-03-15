<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


interface ConversationPersistentStoreInterface
{
    /**
     * ConversationPersistentStoreInterface constructor.
     *
     * @param Configure $configure
     */
    public function __construct(Configure $configure);

    /**
     * @param ConversationPersistentSerializable $persistent
     *
     * @return void
     */
    public function save($persistent);

    /**
     * @param string $user_id
     * @param string $name
     *
     * @return ConversationPersistentSerializable
     */
    public function read($user_id, $name = null);

    /**
     * @param string $user_id
     * @param string $name
     *
     * @return void
     */
    public function delete($user_id, $name);

    /**
     * @param string $user_id
     *
     * @return void
     */
    public function deleteExpired($user_id);

    /**
     * @return void
     */
    public function deleteAll();
}
