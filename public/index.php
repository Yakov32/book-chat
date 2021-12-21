<?php

use Workerman\Worker;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

$ws_worker = new Worker("websocket://0.0.0.0:2446");

// 4 processes
$ws_worker->count = 4;

// Emitted when new connection come
$ws_worker->onConnect = function($connection)
{
    // Emitted when websocket handshake done
    $connection->onWebSocketConnect = function($connection)
    {
        echo "New connection\n";
    };
};

// Emitted when data is received
$ws_worker->onMessage = function($connection, $data)
{
    // Send hello $data
    $connection->send('hello ' . $data);
};

// Emitted when connection closed
$ws_worker->onClose = function($connection)
{
    echo "Connection closed";
};

// Run worker
Worker::runAll();