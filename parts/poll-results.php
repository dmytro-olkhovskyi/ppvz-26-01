<?php
    require 'poll-data.php';

    if (isset($_POST['answers']) && ($answers = $_POST['answers']) && is_array($answers) && count($answers)) {

        /*$answers = $_POST['answers'];
        if (is_array($answers) && count($answers)) {
        }*/

        $correct_count = 0;
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

        echo '<hr>Correct ' . $correct_count . ' from ' . count($questions);

    } else {
        echo '<p>Empty data!</p>';
    }
?>