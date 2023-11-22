<?php

namespace CommonKnowledge\Monolog;

use Env\Env;
use Monolog\Handler\LogglyHandler;
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

        $loggly_api_key = Env::get("LOGGLY_CUSTOMER_TOKEN");

        if ($loggly_api_key) {
            $logger->pushHandler(new LogglyHandler("{$loggly_api_key}/tag/monolog'"));
        }

        return $logger;
    }
}
