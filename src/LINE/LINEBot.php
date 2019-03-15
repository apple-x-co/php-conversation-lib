<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/09/20
 * Time: 8:42
 */

namespace Conversation\LINE;


use LINE\LINEBot\HTTPClient;

/**
 * Class LINEBot
 * 新しいAPIに対応したSDKの暫定版
 *
 * @package Conversation\LINE
 */
class LINEBot extends \LINE\LINEBot
{
    /** @var string */
    private $endpointBase;
    /** @var \LINE\LINEBot\HTTPClient */
    private $httpClient;

    public function __construct(HTTPClient $httpClient, array $args)
    {
        $this->httpClient = $httpClient;
        $this->endpointBase = \LINE\LINEBot::DEFAULT_ENDPOINT_BASE;

        parent::__construct($httpClient, $args);
    }

    /**
     * @param $richMenuId
     *
     * @return \LINE\LINEBot\Response
     */
    public function linkDefaultRichMenu($richMenuId)
    {
        $url = sprintf(
            '%s/v2/bot/user/all/richmenu/%s',
            $this->endpointBase,
            urlencode($richMenuId)
        );
        return $this->httpClient->post($url, []);
    }

    /**
     * @return \LINE\LINEBot\Response
     */
    public function getDefaultRichMenu()
    {
        $url = sprintf('%s/v2/bot/user/all/richmenu', $this->endpointBase);
        return $this->httpClient->get($url, []);
    }

    /**
     * @return \LINE\LINEBot\Response
     */
    public function unlinkDefaultRichMenu()
    {
        $url = sprintf('%s/v2/bot/user/all/richmenu', $this->endpointBase);
        return $this->httpClient->delete($url);
    }
}
