<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$server = new \WebServer\Server();
$server->config()->setConfigDirectory(realpath(__DIR__ . '/../../Config/Routing'));
$server->execute(['*']);