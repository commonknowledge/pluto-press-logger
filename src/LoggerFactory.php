<?php

namespace CommonKnowledge\Monolog;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class LoggerFactory
{

    /**
     * @return Logger
     */
    public static function getLogger(string $name, string $log_dir = null)
    {
        $logger = new Logger($name);
        if (!$log_dir) {
            $log_dir = dirname(__DIR__, 4) . '/logs';
        }
        $logger->pushHandler(new RotatingFileHandler($log_dir . '/' . $name . '.log', maxFiles: 32));
        return $logger;
    }
}
