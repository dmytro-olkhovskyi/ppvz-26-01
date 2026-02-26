<?php
    require 'poll-data.php';
?>

<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <?php

    foreach($questions as $q_key => $q_value) {
        echo '<p>' . $q_value['question'] . '</p>';

        foreach($q_value['answers'] as $a_key => $a_value): ?>
            <label>
                <input type="radio" name="answers[<?= $q_key ?>]" value="<?= $a_key ?>">
                <?= $a_value['answer'] ?>
            </label>
        <?php
        endforeach;
    }
    
    ?>

    <!--
    <p>Question 1</p>
    <label>
        <input type="radio" name="answers[1]" value="1">
        Answer 1
    </label>
    <label>
        <input type="radio" name="answers[1]" value="2">
        Answer 2
    </label>
    <hr>
    <p>Question 2</p>
    <label>
        <input type="radio" name="answers[2]" value="1">
        Answer 1
    </label>
    <label>
        <input type="radio" name="answers[2]" value="2">
        Answer 2
    </label>
    -->
    
    <hr>
    <input type="hidden" name="task" value="poll-results">
    <input type="submit">
    <input type="reset">
</form>