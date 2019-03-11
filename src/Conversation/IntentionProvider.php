<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/12/24
 * Time: 13:28
 */

namespace Conversation;


class IntentionProvider
{
    private $groups;

    /**
     * IntentionProvider constructor.
     *
     * @param IntentionGroup[] $groups
     */
    public function __construct($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @param $id
     *
     * @return IntentionGroup|null
     */
    public function getIntention($id)
    {
        foreach ($this->groups as $group) {
            if ($group->getId() === $id) {
                return $group;
            }
        }

        return null;
    }

    /**
     * @param $id
     * @param $name
     *
     * @return AbstractIntentionHandler|null
     */
    public function getHandler($id, $name)
    {
        $group = $this->getIntention($id);
        if ($group === null) {
            return null;
        }

        $intentions = $group->getIntentions();
        foreach ($intentions as $intention) {
            if ($intention->getName() === $name) {
                return $intention;
            }
        }

        return null;
    }
}
