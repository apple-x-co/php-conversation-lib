<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/24
 * Time: 13:28
 */

namespace Conversation;


class IntentionConfigLoader
{
    /**
     * @param Configure $configure
     *
     * @return IntentionProvider
     */
    public static function load($configure)
    {
        $intention_groups = [];
        $config_intention_groups = $configure->read('Intention');
        foreach ($config_intention_groups as $config_intention_group) {

            $intentions = [];
            $config_actions = $config_intention_group['actions'];
            foreach ($config_actions as $config_action) {
                $class_name = $config_action['class'];
                if ( ! class_exists($class_name)) {
                    continue;
                }

                $class = new $class_name(
                    $config_action['name'],
                    isset($config_action['label']) ? $config_action['label'] : null
                );
                if ( ! ($class instanceof AbstractIntentionHandler)) {
                    continue;
                }

                $intentions[] = $class;
            }

            if (empty($intentions)) {
                continue;
            }

            $intention_groups[] = new IntentionGroup(
                $config_intention_group['id'],
                $intentions,
                isset($config_intention_group['label']) ? $config_intention_group['label'] : null
            );
        }

        return new IntentionProvider($intention_groups);
    }
}
