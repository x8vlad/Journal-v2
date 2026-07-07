<?php

namespace app\service\logger;

use app\service\logger\LoggerInterface;
//
class FileLogger implements LoggerInterface
{
    public function info($message) : void
    {
        // TODO: Implement log_info() method.
        file_put_contents("../logs/testSystem.log",
            "INFO. Date of log: " . date("Y/m/d") . " " . $message .  "\n",
            FILE_APPEND);
    }

    public function error($message) : void {
        file_put_contents("../logs/testSystem.log",
            "ERROR. Date of log: " . date("Y/m/d") . " " . $message .  "\n",
            FILE_APPEND);
    }

    public function warning($message) : void {
        file_put_contents("../logs/testSystem.log",
        "WARNING. Date of log: " . date("Y/m/d") . " " . $message .  "\n",
        FILE_APPEND);
    }
}