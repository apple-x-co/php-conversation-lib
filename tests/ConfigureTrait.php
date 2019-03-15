<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-15
 * Time: 09:53
 */

namespace Tests\Conversation;


use Conversation\Configure;

trait ConfigureTrait
{
    private $configure = null;

    /**
     * @return Configure
     */
    private function getConfigure()
    {
        if ($this->configure === null) {
            $this->configure = Configure::getInstance(getenv('CONVERSATION_CONFIG_PATH'));
        }

        return $this->configure;
    }
}