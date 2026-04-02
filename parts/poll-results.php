<?php
    require 'poll-data.php';

    if (isset($_POST['answers']) && ($answers = $_POST['answers']) && is_array($answers) && count($answers)) {

        /*$answers = $_POST['answers'];
        if (is_array($answers) && count($answers)) {
        }*/

        $correct_count = 0;
        $total = count($questions);

        foreach ($answers as $key => $value) {
            $question = $questions[$key];
            $answer = $question['answers'][$value];

            echo 'Answer "' . $answer['answer'] . '" for the question "' . $question['question'] . '" is ';

            if ($answer['value']) {
                echo 'CORRECT!';
                $correct_count++;
            } else {
                echo 'WRONG!';
            }

            echo '<hr>';
        }
        
        echo '<hr>Correct ' . $correct_count . ' from ' . $total;

        $q_res = 'INSERT INTO results (correct, total) VALUES (?, ?)';
        $q_st = $db->prepare($q_res);
        $q_st->bind_param('ii', $correct_count, $total);
        $q_st->execute();

        // $res_q = $db->execute_query($q_res, [$correct_count, $total]);

    } else {
        echo '<p>Empty data!</p>';
    }


    // Print all results (table)
    //
?>