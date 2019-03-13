<?php

class Controller
{
    private $mysql;
    private $logger;

    function __construct()
    {
        $this->mysql = new mysqli('localhost', 'zeroone', 'xAqaWO', 'Default');
        $this->logger = new Katzgrau\KLogger\Logger(__DIR__.'/../logs');
    }

    function getMySQL()
    {
        return $this->mysql;
    }

    function getLogger()
    {
        return $this->logger;
    }
}