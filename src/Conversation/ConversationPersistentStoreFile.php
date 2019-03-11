<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/24
 * Time: 18:38
 */

namespace Conversation;


class ConversationPersistentStoreFile implements ConversationPersistentStoreInterface
{
    private $configure;

    /**
     * ConversationPersistentStoreFile constructor.
     *
     * @param Configure $configure
     */
    public function __construct(Configure $configure)
    {
        $this->configure = $configure;
    }

    /**
     * @param ConversationPersistentSerializable $persistent
     *
     * @return void
     */
    public function save($persistent)
    {
        $user_id    = $persistent->getUserId();
        $serialized = $persistent->serialize();

        $file_path = $this->configure->read('Persistent.directoryPath');
        $extension = $this->configure->read('Persistent.extension');

        if ($handle = opendir($file_path)) {
            while (($file_name = readdir($handle)) !== false) {
                $file = new File($file_path, $file_name);
                if ( ! $file->exists() || $file->isDirectory()) {
                    continue;
                }
                $strings = preg_split("/\./", $file_name);
                if ( ! is_array($strings) || (count($strings) !== 3)) {
                    continue;
                }
                if ($strings[2] !== $extension) {
                    continue;
                }
                if ($strings[0] === md5($user_id)) {
                    $file->delete();
                    break;
                }
            }
        }

        $expire_date = date('YmdHis', strtotime($this->configure->read('Persistent.expires')));
        $file_name   = md5($user_id) . '.' . $expire_date . '.' . $this->configure->read('Persistent.extension');

        $file = new File($file_path, $file_name);
        $file->write($serialized);
    }

    /**
     * @param string $user_id
     * @param string $name
     *
     * @return ConversationPersistentSerializable
     */
    public function read($user_id, $name = null)
    {
        $file_path = $this->configure->read('Persistent.directoryPath');
        $extension = $this->configure->read('Persistent.extension');

        $unserialized = null;

        if ($handle = opendir($file_path)) {
            $now = date('YmdHis');

            while (($file_name = readdir($handle)) !== false) {
                $file = new File($file_path, $file_name);
                if ( ! $file->exists() || $file->isDirectory()) {
                    continue;
                }
                $strings = preg_split("/\./", $file_name);
                if ( ! is_array($strings) || (count($strings) !== 3)) {
                    continue;
                }
                if ($strings[2] !== $extension) {
                    continue;
                }
                $date = date("YmdHis", strtotime($strings[1]));
                if (strtotime($now) > strtotime($date)) {
                    $file->delete();
                    continue;
                }
                if ($strings[0] === md5($user_id)) {
                    $serializer = SerializerFactory::createSerializer(true);
                    $unserialized = $serializer->unserialize($file->getContents());
                }
            }
        }

        return $unserialized;
    }

    /**
     * @param string $user_id
     * @param string $name
     *
     * @return void
     */
    public function delete($user_id, $name = null)
    {
        $file_path = $this->configure->read('Persistent.directoryPath');

        if ($handle = opendir($file_path)) {
            while (($file_name = readdir($handle)) !== false) {
                $file = new File($file_path, $file_name);
                if ( ! $file->exists() || $file->isDirectory()) {
                    continue;
                }
                $strings = preg_split("/\./", $file_name);
                if ( ! is_array($strings) || (count($strings) !== 3)) {
                    continue;
                }
                if ($strings[0] === md5($user_id)) {
                    $file->delete();
                    break;
                }
            }
        }
    }

    /**
     * @param string $user_id
     *
     * @return void
     */
    public function deleteExpired($user_id)
    {
        $this->delete($user_id);
    }

    /**
     * @return void
     */
    public function deleteAll()
    {
        $file_path = $this->configure->read('Persistent.directoryPath');
        $extension = $this->configure->read('Persistent.extension');

        if ($handle = opendir($file_path)) {
            while (($file_name = readdir($handle)) !== false) {
                $file = new File($file_path, $file_name);
                if ( ! $file->exists() || $file->isDirectory()) {
                    continue;
                }
                $strings = preg_split("/\./", $file_name);
                if ( ! is_array($strings) || (count($strings) !== 3)) {
                    continue;
                }
                if ($strings[2] !== $extension) {
                    continue;
                }
                $file->delete();
            }
        }
    }
}
