<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/06
 * Time: 17:33
 */

namespace Conversation;


use Conversation\Exception\ConversationAssistantUnknownException;
use Conversation\Exception\FileNotfoundException;

class ConversationAssistantFactory
{

    /**
     * @param Configure $configure
     * @param string $someone
     *
     * @return ConversationAssistantInterface
     *
     * @throws ConversationAssistantUnknownException
     * @throws FileNotfoundException
     */
    public static function create($configure, $someone = 'line')
    {
        $assistant = null;
        if ($someone === 'line') {
            $assistant = new LineConversationAssistant($configure);
        } elseif ($someone === 'mock') {
            $assistant = new MockConversationAssistant($configure);
        } else {
            throw new ConversationAssistantUnknownException('unknown type');
        }

        $file   = new File(static::getLogDirectory($configure)->getPath(), $someone . '.log');
        $logger = new Logger($file);

        $assistant->setLogger($logger);

        return $assistant;
    }

    /**
     * @param Configure $configure
     *
     * @return File
     * @throws FileNotfoundException
     */
    private static function getLogDirectory($configure)
    {
        $directory = new File($configure->read('Log.directoryPath'));
        if ( ! $directory->exists()) {
            throw new FileNotfoundException('not found log directory');
        }

        return $directory;
    }
}