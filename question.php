<?php

include_once('start.php');

if (isset($_POST['q_num'])){
    $q_num=(int) $_POST['q_num'];

    try {
        $stmt = $db->prepare("SELECT id FROM questions ORDER BY sort LIMIT 1 OFFSET :q_num ");
        $stmt->bindParam(':q_num', $q_num, PDO::PARAM_INT);
        $stmt->execute();
        $q_id = $stmt->fetch()['id']; 

        $stmt = $db->prepare("Select * from questions q inner join options o on q.id = o.question_id where q.id=:q_id order by o.sort");
        $sql_data = [':q_id' => $q_id];
        $stmt->execute($sql_data);
        $result = $stmt->fetchAll();
        foreach ($result as $row){
            $question['type'] = $row['type'] == 1 ? 'radio' : 'checkbox';
            $question['title'] = $row['title'];
            $question['id'] = $row['question_id'];
            $question['options'][$row['id']] = $row['option_text'];
            $question['required'] = $row['is_required'];
        }
    } catch (PDOException $e) {
        trigger_error($e->getMessage(), E_USER_ERROR);
    }

    if(!empty($question)){
        $twig = connect_twig();
        $template = $twig->loadTemplate('question.tpl');
        $output = $template->render(['question' => $question]); 
    } else {
        $output = "no_question";
    }
    echo $output;
} 
