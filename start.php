<?php
ini_set('display_errors', '1');
ini_set('error_log', '/var/log/php_error_log');
error_reporting(E_ALL &~ E_STRICT);
include_once('helpers.php');

$db_options = array('dsn' => 'mysql:host=localhost;dbname=survey',
    'username' => 'survey',
    'password' => 'password',
    'timeout' => 15,
    'is_persistent' => false);

$db = connect_db($db_options);

