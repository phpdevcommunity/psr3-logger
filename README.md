# PHP Logger PSR-3

A straightforward logging library for PHP that implements PSR-3, making it easy to integrate logging into your project.

## Installation

Install via [Composer](https://getcomposer.org/):

```bash
composer require phpdevcommunity/psr3-logger
```

## Requirements

- PHP 7.4 or higher

## Usage

Here's how to set up and use the logger:

```php
<?php

use PhpDevCommunity\Log\Handler\FileHandler;
use PhpDevCommunity\Log\Logger;
use Psr\Log\LogLevel;

// Define the log file path
$logFileName = dirname(__DIR__) . '/var/log/' . date('Y-m-d') . '.log';

// Create a file handler for logging to a file
$handler = new FileHandler($logFileName);

// Initialize the logger with the file handler
$logger = new Logger($handler);

// Log an emergency message
$logger->log(LogLevel::EMERGENCY, 'An error has occurred');
```


## Contributing

Contributions are welcome! Feel free to open issues or submit pull requests to help improve the library.

## License

This library is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
