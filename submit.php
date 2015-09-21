<?php

include_once('start.php');

ksort($_POST);

foreach ($_POST as $question_id => $answers){
    if ($question_id == 1){
        $sqldata[':answer_id'] = (int)$answers[0];
        $create_user = $db->prepare('Insert into users (gender) SELECT option_text from options where id = :answer_id');
        $create_user->execute($sqldata);
        $user_id = $db->lastInsertId();
    }
    elseif (!empty($user_id)){
      foreach($answers as $option_id){
          $data[':option_id'] = $option_id;
          $data[':user_id'] = $user_id;
          $stmt = $db->prepare('Insert into answers (option_id, user_id) values(:option_id, :user_id)');
          $stmt->execute($data);
      }
    }
}

header('Location: /survey/results.php');
