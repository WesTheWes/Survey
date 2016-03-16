<?php

include_once('start.php');

try
{
    $result = $db->query("Select count(id) from questions");
    $result = $result->fetch();
    $length = $result["count(id)"];
}
catch (PDOException $e)
{
    trigger_error($e->getMessage(), E_USER_ERROR);
    return false;
}


$twig = connect_twig();
$template = $twig->loadTemplate('survey.tpl');
$output = $template->render(array('length' => $length));
echo $output;
