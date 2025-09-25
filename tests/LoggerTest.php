<?php

namespace Test\PhpDevCommunity\Log;

use PhpDevCommunity\Log\Handler\MemoryHandler;
use PhpDevCommunity\Log\Logger;
use PhpDevCommunity\UniTester\TestCase;
use Psr\Log\LogLevel;

class LoggerTest extends TestCase
{

    protected function setUp(): void
    {
        // TODO: Implement setUp() method.
    }

    protected function tearDown(): void
    {
        // TODO: Implement tearDown() method.
    }

    protected function execute(): void
    {
        $storage = [];
        $logger = new Logger(new MemoryHandler($storage));
        $logger->log(LogLevel::INFO, 'is a test');
        $this->assertStringEndsWith($storage[0], '[INFO]: is a test');
    }
}
