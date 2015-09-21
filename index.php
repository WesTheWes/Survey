<?php

include_once('start.php');

try
{
    $result = $db->query("Select * from questions q inner join options o on q.id = o.question_id order by q.sort, o.sort");
    foreach ($result as $row)
    {
        $row['type'] = $row['type'] == 1 ? 'radio' : 'checkbox';

        $survey[$row['question_id']]['type'] = $row['type'];
        $survey[$row['question_id']]['question'] = $row['title'];
        $survey[$row['question_id']]['id'] = $row['question_id'];
        $survey[$row['question_id']]['options'][$row['id']] = $row['option_text'];
    }
}
catch (PDOException $e)
{
    trigger_error($e->getMessage(), E_USER_ERROR);
    return false;
}


$twig = connect_twig();
$template = $twig->loadTemplate('survey.tpl');
$output = $template->render(array('surveys' => $survey));
echo $output;
