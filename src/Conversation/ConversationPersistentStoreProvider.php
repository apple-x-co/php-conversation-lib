<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/02
 * Time: 9:11
 */

namespace Conversation;


class ConversationPersistentStoreProvider
{
    /** @var ConversationPersistentStoreInterface */
    private $persistent;

    /**
     * ConversationPersistentStoreProvider constructor.
     *
     * @param ConversationPersistentStoreInterface $persistent
     */
    public function __construct($persistent)
    {
        $this->persistent = $persistent;
    }

    /**
     * @param ConversationPersistentSerializable $persistent
     *
     * @return void
     */
    public function save($persistent)
    {
        $this->persistent->save($persistent);
    }

    /**
     * @param string $user_id
     * @param string $name
     *
     * @return ConversationPersistentSerializable
     */
    public function read($user_id, $name = null)
    {
        return $this->persistent->read($user_id, $name);
    }

    /**
     * @param string $user_id
     * @param string $name
     *
     * @return void
     */
    public function delete($user_id, $name)
    {
        $this->persistent->delete($user_id, $name);
    }

    /**
     * @param string $user_id
     *
     * @return void
     */
    public function deleteExpired($user_id)
    {
        $this->persistent->deleteExpired($user_id);
    }

    /**
     * @return void
     */
    public function deleteAll()
    {
        $this->persistent->deleteAll();
    }
}
