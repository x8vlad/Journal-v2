<?php
namespace app\service\logger;
interface LoggerInterface {
    public function info($message) : void;
    public function error($message) : void;
}