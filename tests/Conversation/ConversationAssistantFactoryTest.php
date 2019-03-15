<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2019-03-15
 * Time: 09:46
 */

namespace Tests\Conversation;


use Conversation\Configure;
use Conversation\ConversationAssistantFactory;
use Conversation\LineConversationAssistant;
use PHPUnit\Framework\TestCase;

class ConversationAssistantFactoryTest extends TestCase
{
    use ConfigureTrait;

    public function testCreate()
    {
        $assistant = ConversationAssistantFactory::create($this->getConfigure());

        $this->assertInstanceOf(LineConversationAssistant::class, $assistant);
    }
}