<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/09
 * Time: 14:20
 */

namespace Conversation;


use Conversation\Exception\AccessDeniedException;

class File
{
    /** @var string */
    private $path;

    /** @var null|string */
    private $name;

    /** @var string */
    protected $default_permission = '644';

    /** @var string */
    private $dirname;

    /** @var string */
    private $basename;

    /** @var string|null */
    private $extension;

    /** @var string|null */
    private $filename;

    /** @var bool */
    private $is_directory;

    /**
     * File constructor.
     *
     * @param string $path
     * @param string|null $name
     */
    public function __construct($path, $name = null)
    {
        $this->path = static::concat_path($path, $name);
        $this->name = $name;

        $path_parts         = pathinfo($this->getAbsolutePath());
        $this->dirname      = $path_parts['dirname'];
        $this->basename     = $path_parts['basename'];
        $this->extension    = isset($path_parts['extension']) ? $path_parts['extension'] : null;
        $this->filename     = $path_parts['filename'];
        $this->is_directory = is_dir($this->path);
    }

    /**
     * @param string $path
     * @param string|null $name
     *
     * @return string
     */
    private static function concat_path($path, $name = null)
    {
        if ( ! is_null($name) &&
             substr($path, -1, 1) !== DIRECTORY_SEPARATOR) {
            $path .= DIRECTORY_SEPARATOR;
        }

        if ( ! is_null($name)) {
            $path .= $name;
        }

        return $path;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getAbsolutePath()
    {
        $parts = preg_split("#" . DIRECTORY_SEPARATOR . "#", $this->path);
        $stack = [];
        foreach ($parts as $directory) {
            if ($directory === '..') {
                if (count($stack)) {
                    array_pop($stack);
                }
            } elseif ($directory === '.') {
            } elseif ($directory === '') {
            } else {
                array_push($stack, $directory);
            }
        }

        return DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $stack);
    }

    /**
     * @return bool
     */
    public function isDirectory()
    {
        return $this->is_directory;
    }

    /**
     * 「/aaa/bbb/」→「/aaa/bbb/」
     * 「/aaa/bbb/file.txt」→「/aaa/bbb/」
     *
     * @return string
     */
    public function getDirectoryName()
    {
        if ($this->is_directory) {
            return $this->getAbsolutePath() . DIRECTORY_SEPARATOR;
        }

        return $this->dirname . DIRECTORY_SEPARATOR;
    }

    /**
     * 「/aaa/bbb/」→「bbb」
     * 「file.txt」→「file.txt」
     *
     * @return string
     */
    public function getBaseName()
    {
        return $this->basename;
    }

    /**
     * 「/aaa/bbb/」→「」
     * 「file.txt」→「file」
     *
     * @return string
     */
    public function getFileName()
    {
        if ($this->is_directory) {
            return null;
        }

        return $this->filename;
    }

    /**
     * 「/aaa/bbb/」→「」
     * 「file.txt」→「txt」
     *
     * @return null|string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return filesize($this->path);
    }

    /**
     * @return int
     */
    public function lastModified()
    {
        return filemtime($this->path);
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return file_exists($this->path) ? true : false;
    }

    /**
     * @return bool|null|string
     */
    public function getContents()
    {
        if (is_dir($this->path)) {
            return null;
        }

        return file_get_contents($this->path);
    }

    /**
     *
     */
    public function delete()
    {
        if (is_dir($this->path)) {
            return null;
        }

        unlink($this->path);
    }

    /**
     * @param string $path
     * @param string|null $name
     *
     * @return bool
     */
    public static function file_exists($path, $name = null)
    {
        $path = static::concat_path($path, $name);

        return file_exists($path) ? true : false;
    }

    /**
     * @return null|string
     */
    public function getMineType()
    {
        return static::get_mine_type($this->path);
    }

    /**
     * @param $path
     *
     * @return null|string
     */
    public static function get_mine_type($path)
    {
        if (is_dir($path)) {
            return null;
        }

        return mime_content_type($path);
    }

    /**
     * @param $path
     *
     * @return bool|null|string
     */
    public static function get_contents($path)
    {
        if (is_dir($path)) {
            return null;
        }

        return file_get_contents($path);
    }

    /**
     * @param bool $recursive
     *
     * @return void
     */
    public function makeDirectory($recursive = true)
    {
        $path = $this->path;
        if (is_file($this->path)) {
            $path = $this->getDirectoryName();
        }

        mkdir($path, $this->default_permission, $recursive);
    }

    /**
     * @param bool $atomically
     */
    public function clear($atomically = true)
    {
        if ( ! file_exists($this->path)) {
            return;
        }
        if ( ! is_file($this->path)) {
            return;
        }
        if ( ! is_writable($this->path)) {
            return;
        }

        $fp = fopen($this->path, 'c');
        if ( ! $fp) {
            return;
        }

        if ($atomically && ! flock($fp, LOCK_EX)) {
            fclose($fp);

            return;
        }

        ftruncate($fp, 0);
        fseek($fp, 0);

        if ($atomically) {
            flock($fp, LOCK_UN);
        }

        fclose($fp);
    }

    /**
     * @param $content
     * @param $atomically
     */
    public function write($content, $atomically = true)
    {
        $mode = 'a';

        $directory_path = $this->getDirectoryName();
        if ( ! is_writable($directory_path)) {
            throw new AccessDeniedException();
        }

        $fp = fopen($this->path, $mode);
        if ( ! $fp) {
            return;
        }
        if ($atomically && ! flock($fp, LOCK_EX)) {
            fclose($fp);

            return;
        }

        fwrite($fp, $content . "\n");

        if ($atomically) {
            flock($fp, LOCK_UN);
        }

        fclose($fp);
    }

    /**
     * @param $to_path
     *
     * @return File
     */
    public function move($to_path)
    {
        if ( ! $this->isDirectory() && is_dir($to_path)) {
            $to_path = static::concat_path($to_path, $this->getFileName());
        }

        if ( ! rename($this->path, $to_path)) {
            return null;
        };

        return new static($to_path);
    }
}