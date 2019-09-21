<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2018/09/20
 * Time: 8:42
 */

namespace Conversation\LINE;


use DateTime;
use DateTimeZone;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\Response;

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

    /**
     * @param DateTime $datetime
     * @return Response
     */
    public function getNumberOfInsightMessageDelivery(DateTime $datetime)
    {
        $url = $this->endpointBase . '/v2/bot/insight/message/delivery';
        $datetime->setTimezone(new DateTimeZone('Asia/Tokyo'));
        return $this->httpClient->get($url, ['date' => $datetime->format('Ymd')]);
    }

    /**
     * @param DateTime $datetime
     * @return Response
     */
    public function getNumberOfInsightFollowers(DateTime $datetime)
    {
        $url = $this->endpointBase . '/v2/bot/insight/followers';
        $datetime->setTimezone(new DateTimeZone('Asia/Tokyo'));
        return $this->httpClient->get($url, ['date' => $datetime->format('Ymd')]);
    }

    /**
     * @return Response
     */
    public function getNumberOfInsightDemographic()
    {
        $url = $this->endpointBase . '/v2/bot/insight/demographic';
        return $this->httpClient->get($url);
    }
}
