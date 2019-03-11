<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/04
 * Time: 8:17
 */

namespace Conversation\ConversationMessage\Flex\Container;


class FlexCarousel implements FlexContainerInterface
{
    /** @var FlexContainerType */
    private $type;

    /** @var FlexBubble[] */
    private $contents;

    public function __construct()
    {
        $this->type = new FlexContainerType(FlexContainerType::CAROUSEL);
        $this->contents = [];
    }

    /**
     * @return FlexContainerType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param FlexBubble $content
     */
    public function addContent($content)
    {
        $this->contents[] = $content;
    }

    /**
     * @return array|FlexBubble[]
     */
    public function getContents()
    {
        return $this->contents;
    }
}
