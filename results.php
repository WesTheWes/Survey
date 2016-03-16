<?php

include_once('start.php');

try
{
    $result = $db->query("
SELECT
    gender, questions.title, options.option_text, COUNT(*) responses
FROM
    answers
        INNER JOIN
    users ON answers.user_id = users.id
        INNER JOIN
    options ON options.id = option_id
        INNER JOIN
    questions ON questions.id = options.question_id
GROUP BY gender , questions.title , options.option_text ");
    foreach ($result as $row)
    {
        $results[$row['gender']][$row['title']] = array($row['option_text'] => $row['responses']);
    }
}
catch (PDOException $e)
{
    trigger_error($e->getMessage(), E_USER_ERROR);
    return false;
}

$twig = connect_twig();
$template = $twig->loadTemplate('results.tpl');
$output = $template->render(array('results' => $results));
echo $output;
