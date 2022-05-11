<?php

$dbHost = $_ENV['DB_HOST'];
$dbPort = $_ENV['DB_PORT'];
$dbName = $_ENV['DB_NAME'];
$dbUsername = $_ENV['DB_USER'];
$dbPassword = $_ENV['DB_PASSWORD'];

return [
    'class' => 'yii\db\Connection',
    'dsn' => "pgsql:host=$dbHost;port=$dbPort;dbname=$dbName",
    'username' => $dbUsername,
    'password' => $dbPassword,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
