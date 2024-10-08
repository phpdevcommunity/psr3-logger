<?php

namespace Test\PhpDevCommunity\Log;
use PhpDevCommunity\UniTester\TestCase;
use Psr\Log\LogLevel;

class FileHandlerTest extends TestCase
{

    private ?string $tmpFile = null;

    protected function setUp(): void
    {
        $this->tmpFile = sys_get_temp_dir() . '/log/' . date('Y-m-d') . '.log';
        if (file_exists($this->tmpFile)) {
            unlink($this->tmpFile);
        }
    }

    protected function tearDown(): void
    {
        if (file_exists($this->tmpFile)) {
            unlink($this->tmpFile);
        }

        if (is_dir(dirname($this->tmpFile))) {
            rmdir(dirname($this->tmpFile));
        }
    }

    protected function execute(): void
    {
       $this->testCreateDir();
       $this->testWriteInFile();
    }


    public function testCreateDir()
    {
        $tmp_dir = dirname($this->tmpFile);
        if (is_dir($tmp_dir)) {
            rmdir($tmp_dir);
        }
        new \PhpDevCommunity\Log\Handler\FileHandler($this->tmpFile);
        $this->assertTrue(is_dir($tmp_dir));
    }

    public function testWriteInFile()
    {
        $handler = new \PhpDevCommunity\Log\Handler\FileHandler($this->tmpFile);
        $vars = [
            'message' => 'is a test',
            'level' => strtoupper(LogLevel::INFO),
            'timestamp' => (new \DateTimeImmutable())->format('c'),
        ];
        $handler->handle($vars);

        $this->assertTrue(file_exists($this->tmpFile));
        $fileObject = new \SplFileObject($this->tmpFile);
        $line = $fileObject->current();
        $this->assertEquals($line, sprintf('%s [%s]: %s' . PHP_EOL, $vars['timestamp'], $vars['level'], $vars['message']));

    }

}
