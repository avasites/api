<?php
require_once './autoload.php';

$config = require __DIR__ . '/config.php';

\app\Application::run($config);