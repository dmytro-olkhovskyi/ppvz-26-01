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

?>

<hr>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Correct</th>
            <th>Total</th>
            <th>DateTime</th>
        </tr>
    </thead>

    <tbody> 
<?php

    // Print all results (table)
    $sql_r = "SELECT * FROM results";
    $res_r = $db->query($sql_r);

    while ($row_r = $res_r->fetch_assoc()) {
        echo '<tr>' . 
             '<td>' . $row_r['id'] . '</td>' .
             '<td>' . $row_r['correct'] . '</td>' .
             '<td>' . $row_r['total'] . '</td>' .
             '<td>' . $row_r['datetime'] . '</td>' .
             '</tr>';
    }
?>
    </tbody>
</table>