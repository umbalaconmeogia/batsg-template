<?php
$cache = TRUE;
return [
    'db' => [
		'class' => 'yii\db\Connection',
		'dsn' => 'pgsql:host=localhost;dbname=eas_inhouse',
		'username' => 'eas_inhouse',
		'password' => 'eas_inhouse',
		'charset' => 'utf8',
		'enableSchemaCache' => $cache,
		'schemaCacheDuration' => 3600, // Duration of schema cache.
		'schemaCache' => 'cache', // Name of the cache component used to store schema information
    ],
    'params' => [
    ],
];