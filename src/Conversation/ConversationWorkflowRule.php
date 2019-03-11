<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/21
 * Time: 15:44
 */

namespace Conversation;


class ConversationWorkflowRule
{
    /** @var string[] */
    private $keywords;

    /** @var int */
    private $start_date;

    /** @var int */
    private $end_date;

    /** @var string */
    private $abort_keywords;

    /**
     * ConversationWorkflowRule constructor.
     *
     * @param string[] $keywords
     * @param int $start_date
     * @param int $end_date
     * @param string[] $abort_keywords
     */
    public function __construct($keywords, $start_date, $end_date, $abort_keywords)
    {
        $this->keywords       = $keywords;
        $this->start_date     = $start_date;
        $this->end_date       = $end_date;
        $this->abort_keywords = $abort_keywords;
    }

    /**
     * @param $keyword
     *
     * @return bool
     */
    public function isMatch($keyword)
    {
        if ( ! empty($this->start_date) && $this->start_date > time()) {
            return false;
        } elseif ( ! empty($this->end_date) && $this->end_date < time()) {
            return false;
        }

        $matched = false;

        foreach ($this->keywords as $reg_exp) {
            if ( ! preg_match("/{$reg_exp}/", $keyword)) {
                continue;
            }
            $matched = true;
            break;
        }

        return $matched;
    }

    /**
     * @param $keyword
     *
     * @return bool
     */
    public function canContinue($keyword)
    {
        $continue = true;

        foreach ($this->abort_keywords as $reg_exp) {
            if ( ! preg_match("/{$reg_exp}/", $keyword)) {
                continue;
            }
            $continue = false;
            break;
        }

        return $continue;
    }
}