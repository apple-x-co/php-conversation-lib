<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/07
 * Time: 10:18
 */

namespace Conversation;


class Helper
{
    /**
     * 配列検索
     *
     * @param $array
     * @param $key
     * @param null $default
     *
     * @return mixed
     * @link https://github.com/rappasoft/laravel-helpers/blob/master/src/helpers.php
     */
    public static function get_array($array, $key, $default = null)
    {
        if (is_null($key)) {
            return $array;
        }
        if (isset($array[$key])) {
            return $array[$key];
        }
        foreach (explode('.', $key) as $segment) {
            if ( ! is_array($array) || ! array_key_exists($segment, $array)) {
                return static::value($default);
            }
            $array = $array[$segment];
        }

        return $array;
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     * @link https://github.com/rappasoft/laravel-helpers/blob/master/src/helpers.php
     */
    private static function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }

    /**
     * ランダム文字列の生成
     *
     * @param integer $length
     * @param string $type
     *
     * @return string
     */
    public static function random_string($length = 8, $type = null)
    {
        $chars = null;
        if (is_null($type)) {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789!#$%&@+?';
        } elseif ($type === 'ALPHA') {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ';
        } elseif ($type === 'NUM') {
            $chars = '0123456789';
        } elseif ($type === 'ALPHA_NUM') {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
        }
        $str = '';
        for ($i = 0; $i < $length; ++$i) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        return $str;
    }
}