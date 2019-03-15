<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/14
 * Time: 9:07
 */

namespace Conversation;


use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface
{
    private $file;

    /**
     * Logger constructor.
     *
     * @param File $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        $debug_backtrace  = debug_backtrace();
        $caller_file_name = $debug_backtrace[0]['file'];
        $caller_file_line = $debug_backtrace[0]['line'];

        $message = $this->normalizeMessage($message);
        $message = $this->buildMessage($message, $context);

        $log = sprintf("[%s] [%s] [%s:%d] %s",
            date("Y-m-d H:i:s"),
            $level,
            $caller_file_name,
            $caller_file_line,
            $message);

        $this->file->write($log);
    }

    /**
     * @param $message
     *
     * @return mixed|string
     */
    protected function normalizeMessage($message)
    {
        if (is_string($message)) {
            return $message;
        }

        $isObject = is_object($message);

        if ($isObject && method_exists($message, '__toString')) {
            return (string)$message;
        }

        return print_r($message, true);
    }

    /**
     * @param $message
     * @param array $context
     *
     * @return string
     */
    protected function buildMessage($message, array $context = array())
    {
        $replace = [];
        foreach ($context as $key => $val) {
            if (! is_array($val) &&
                (! is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }

        return strtr($message, $replace);
    }
}