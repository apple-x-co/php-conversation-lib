<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/09
 * Time: 11:58
 */

namespace Conversation;


class UploadFile
{
    /** @var string */
    private $content;

    /** @var string */
    private $mine_type;

    /** @var int */
    private $length;

    /** @var bool */
    private $saved;

    /** @var array */
    protected $mine_type_extensions = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif'
    ];

    /**
     * UploadFile constructor.
     *
     * @param $mine_type
     * @param $content
     * @param int $length
     */
    public function __construct($mine_type, $content, $length = 0)
    {
        $this->mine_type = $mine_type;
        $this->content   = $content;
        $this->length    = $length;
        $this->saved     = false;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param $directory_path
     * @param null $file_name
     *
     * @return File|null
     */
    public function save($directory_path, $file_name = null)
    {
        if ($this->saved) {
            return null;
        }

        if (is_null($file_name)) {
            $extension = $this->mine_type_extensions[$this->mine_type];
            while (true) {
                $file_name = Helper::random_string(8, 'ALPHA_NUM') . '.' . $extension;
                if ( ! File::file_exists($directory_path, $file_name)) {
                    break;
                }
            }
        }

        $this->saved = true;

        $file = new File($directory_path, $file_name);
        $file->write($this->content);

        return $file;
    }
}
