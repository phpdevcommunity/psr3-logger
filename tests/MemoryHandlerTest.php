<?php

namespace Test\PhpDevCommunity\Log;
use PhpDevCommunity\Log\Handler\MemoryHandler;
use PhpDevCommunity\UniTester\TestCase;
use Psr\Log\LogLevel;

class MemoryHandlerTest extends TestCase
{


    protected function setUp(): void
    {
    }

    protected function tearDown(): void
    {
    }

    protected function execute(): void
    {
        $storage = [];
        $handler = new MemoryHandler($storage);
        $vars = [
            'message' => 'is a test',
            'level' => strtoupper(LogLevel::INFO),
            'timestamp' => (new \DateTimeImmutable())->format('c'),
        ];
        $handler->handle($vars);

        $this->assertEquals(1, count($storage));
        $this->assertEquals($storage[0], sprintf('%s [%s]: %s', $vars['timestamp'], $vars['level'], $vars['message']));
    }



}
