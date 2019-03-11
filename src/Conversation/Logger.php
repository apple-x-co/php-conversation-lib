<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/14
 * Time: 9:07
 */

namespace Conversation;


class Logger
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
     * @param string $level
     * @param mixed $value
     */
    protected function write($level, $value)
    {
        $debug_backtrace  = debug_backtrace();
        $caller_file_name = $debug_backtrace[0]['file'];
        $caller_file_line = $debug_backtrace[0]['line'];

        if ( ! is_array($value)) {
            $log = sprintf("[%s] [%s] [%s:%d] %s",
                date("Y-m-d H:i:s"),
                $level,
                $caller_file_name,
                $caller_file_line,
                print_r($value, true));

            $this->file->write($log);

            return;
        }

        foreach ($value as $val) {
            $log = sprintf("[%s] [%s] [%s:%d] %s",
                date("Y-m-d H:i:s"),
                $level,
                $caller_file_name,
                $caller_file_line,
                print_r($val, true));

            $this->file->write($log);
        }
    }

    /**
     * @param mixed $value
     */
    public function info($value)
    {
        $this->write('INFO', $value);
    }

    /**
     * @param mixed $value
     */
    public function warn($value)
    {
        $this->write('WARN', $value);
    }

    /**
     * @param mixed $value
     */
    public function error($value)
    {
        $this->write('ERROR', $value);
    }
}