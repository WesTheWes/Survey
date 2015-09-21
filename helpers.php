<?php

function connect_db($options = array())
{
    try
    {
        $db = new PDO($options['dsn'], $options['username'], $options['password'], array(
            PDO::ATTR_TIMEOUT => $options['timeout'],
            PDO::ATTR_PERSISTENT => $options['is_persistent'],
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

        return $db;
    }
    catch (PDOException $e)
    {
        trigger_error($e->getMessage(), E_USER_ERROR);
        return false;
    }
}

function connect_twig($options = array())
{

    require_once('Twig/Autoloader.php');

    $defaults = array(
        'path' => '../survey',
        'cache' => '/tmp/',
        'auto_reload' => true,
    );

    $options = array_merge($defaults, $options);

    try
    {
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem($options['path']);
        $twig = new Twig_Environment($loader, array(
            'cache' => $options['cache'],
            'auto_reload' => $options['auto_reload'],
            'autoescape' => true,
        ));

        $twig->addFunction('i18n', new Twig_Function_Function('twig_i18n'));

        return $twig;
    }
    catch (Exception $e)
    {
        trigger_error($e->getMessage(), E_USER_ERROR);

        return false;
    }
}
