<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/11
 * Time: 10:19
 */

namespace Conversation;


use Conversation\Exception\SingletonInitializerException;
use Conversation\File;
use Conversation\Helper;

class Configure
{
    /** @var Configure[] */
    private static $instances = [];

    /** @var array */
    private $config;

    /**
     * Configure constructor.
     */
    public function __construct()
    {
        $this->config = [];
    }

    /**
     * @param string $path
     *
     * @return Configure
     */
    public static function getInstance($path)
    {
        if ( ! array_key_exists($path, static::$instances)) {
            static::$instances[$path] = new static();
            static::$instances[$path]->load($path);
        }

        return static::$instances[$path];
    }

    /**
     *
     */
    public final function __clone()
    {
        throw new SingletonInitializerException();
    }

    /**
     * @param string $path
     */
    public function load($path)
    {
        $configDirectory       = new File($path);
        $config_directory_path = $configDirectory->getDirectoryName();
        $config                = [];
        if ($handle = opendir($config_directory_path)) {
            while (($config_file_name = readdir($handle)) !== false) {
                $file = new File($configDirectory->getAbsolutePath(), $config_file_name);
                if ( ! $file->exists() || $file->isDirectory()) {
                    continue;
                }
                $array = include $file->getAbsolutePath();
                if (empty($array) || is_null($array) || ! is_array($array)) {
                    continue;
                }
                $config = array_merge($config, $array);
            }
        }

        $this->config = $config;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function read($key)
    {
        return Helper::get_array($this->config, $key);
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function write($key, $value)
    {
        $this->config[$key] = $value;
    }
}