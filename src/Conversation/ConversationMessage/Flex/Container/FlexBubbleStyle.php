<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 9:57
 */

namespace Conversation\ConversationMessage\Flex\Container;


class FlexBubbleStyle
{
    /** @var FlexBlockStyle */
    private $header;

    /** @var FlexBlockStyle */
    private $hero;

    /** @var FlexBlockStyle */
    private $body;

    /** @var FlexBlockStyle */
    private $footer;

    /**
     * @return FlexBlockStyle
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param FlexBlockStyle $header
     *
     * @return self
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * @return FlexBlockStyle
     */
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * @param FlexBlockStyle $hero
     *
     * @return self
     */
    public function setHero($hero)
    {
        $this->hero = $hero;

        return $this;
    }

    /**
     * @return FlexBlockStyle
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param FlexBlockStyle $body
     *
     * @return self
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return FlexBlockStyle
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param FlexBlockStyle $footer
     *
     * @return self
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;

        return $this;
    }
}