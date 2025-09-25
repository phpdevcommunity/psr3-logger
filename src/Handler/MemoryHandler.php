<?php

namespace PhpDevCommunity\Log\Handler;

final class MemoryHandler implements HandlerInterface
{
    private array $storage;

    public function __construct(array &$storage = [])
    {
        if (!empty($storage)) {
            $storage = [];
        }
        $this->storage = &$storage;
    }

    public function handle(array $vars): void
    {
        $output = self::DEFAULT_FORMAT;
        foreach ($vars as $var => $val) {
            $output = str_replace('%' . $var . '%', $val, $output);
        }
        $this->storage[] = $output;
    }
}
