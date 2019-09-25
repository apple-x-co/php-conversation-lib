<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/08/09
 * Time: 8:45
 */

namespace Conversation\ConversationMessage\Flex\Component;


use Conversation\ConversationMessage\Flex\Property\FlexIconAspectRatio;
use Conversation\ConversationMessage\Flex\Property\FlexIconSize;
use Conversation\ConversationMessage\Flex\Property\FlexMargin;
use Conversation\URL;

class FlexIcon implements FlexComponentInterface
{
    /** @var FlexComponentType */
    private $componentType;

    /** @var URL */
    private $url;

    /** @var FlexMargin */
    private $margin;

    /** @var FlexIconSize */
    private $size;

    /** @var FlexIconAspectRatio */
    private $aspectRatio;

    /**
     * Icon constructor.
     */
    public function __construct()
    {
        $this->componentType = new FlexComponentType(FlexComponentType::ICON);
    }

    /**
     * @param string $url
     *
     * @return self
     * @throws \Conversation\Exception\ConversationException
     */
    public static function icon($url)
    {
        return (new self)->setUrl(new URL($url));
    }

    /**
     * @return FlexComponentType
     */
    public function getComponentType()
    {
        return $this->componentType;
    }

    /**
     * @param FlexComponentType $componentType
     */
    public function setComponentType($componentType)
    {
        $this->componentType = $componentType;
    }

    /**
     * @return URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param URL $url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return FlexMargin
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * @param FlexMargin $margin
     *
     * @return self
     */
    public function setMargin($margin)
    {
        $this->margin = $margin;

        return $this;
    }

    /**
     * @return FlexIconSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param FlexIconSize $size
     *
     * @return self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return FlexIconAspectRatio
     */
    public function getAspectRatio()
    {
        return $this->aspectRatio;
    }

    /**
     * @param FlexIconAspectRatio $aspectRatio
     *
     * @return self
     */
    public function setAspectRatio($aspectRatio)
    {
        $this->aspectRatio = $aspectRatio;

        return $this;
    }
}