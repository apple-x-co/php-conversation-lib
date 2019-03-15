<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 14:53
 */

namespace Conversation;


use Conversation\Configure;
use Conversation\ConversationSkillInterface;
use Conversation\ConversationSkillProvider;

class ConversationSkillConfigLoader
{
    /**
     * @param Configure $configure
     *
     * @return ConversationSkillProvider
     */
    public static function load($configure)
    {
        $config_skills = $configure->read('Skill');

        $skills = [];

        foreach ($config_skills as $class_name) {
            if ( ! class_exists($class_name)) {
                continue;
            }

            $handler = new $class_name;
            if ( ! ($handler instanceof ConversationSkillInterface)) {
                continue;
            }

            $skills[] = $handler;
        }

        return new ConversationSkillProvider($skills);
    }
}