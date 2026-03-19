<?php

require_once 'config.php';

$questions = [];

// 1. Get Questions From DB
$sql_q = "SELECT * FROM questions";
$res_q = $db->query($sql_q);

while ($row_q = $res_q->fetch_assoc()) {
    $quest_id = $row_q["id"];
    $questions[$quest_id] = $row_q;

    $sql_a = "SELECT * FROM answers WHERE question_id = ?";
    
    // 1 variant

    // $answ = $db->prepare($sql_a);
    // $answ->bind_param("i", $quest_id);
    // $answ->execute();
    // $res_a = $answ->get_result();

    // 2 variant

    $res_a = $db->execute_query($sql_a, [$quest_id]);

    $answ_db = [];
    while ($row_a = $res_a->fetch_assoc()) {
        $answ_db[$row_a["id"]] = $row_a;
    }

    $questions[$quest_id]['answers'] = $answ_db;
}

/*
echo '<pre>';
print_r($questions);
echo '</pre>';

die();
*/

// $questions = [
//     1 => [
//         'question' => 'First question',
//         'type' => 'radio', // checkbox
//         'answers' => [
//             1 => [
//                 'answer' => 'Answer Q1 - 1',
//                 'value' => true,
//                 'question_id' => 1
//             ],
//             2 => [
//                 'answer' => 'Answer Q1 - 2',
//                 'value' => false,
//                 'question_id' => 1
//             ]
//         ]
//     ],
//     2 => [
//         'question' => 'Second question',
//         'type' => 'radio',
//         'answers' => [
//             1 => [
//                 'answer' => 'Answer Q2 - 1',
//                 'value' => false,
//                 'question_id' => 2
//             ],
//             2 => [
//                 'answer' => 'Answer Q2 - 2',
//                 'value' => true,
//                 'question_id' => 2
//             ]
//         ]
//     ],
//     3 => [
//         'question' => 'Third question',
//         'type' => 'radio',
//         'answers' => [
//             1 => [
//                 'answer' => 'Answer Q3 - 1',
//                 'value' => true,
//                 'question_id' => 3
//             ],
//             2 => [
//                 'answer' => 'Answer Q3 - 2',
//                 'value' => false,
//                 'question_id' => 3
//             ]
//         ]
//     ]
// ];