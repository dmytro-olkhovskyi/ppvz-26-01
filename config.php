<?php

$db_user = 'quiz';
$db_pass = 'BT3yRL0t!LqKhU6K';
$db_host = 'localhost';
$db_name = 'quiz';
$db_port = 3306;

$db = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$db->set_charset('utf8mb4');

$sql = "
CREATE TABLE IF NOT EXISTS questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    type VARCHAR(50) NOT NULL
) ENGINE=InnoDB;
";

if (!$db->query($sql)) {
    die('Error creating question table: ' . $db->error);
}

$sql = "
CREATE TABLE IF NOT EXISTS answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    answer TEXT NOT NULL,
    value INT NOT NULL,
    question_id INT NOT NULL,
    CONSTRAINT fk_answers_question
        FOREIGN KEY (question_id) REFERENCES questions(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;
";

if (!$db->query($sql)) {
    die('Error creating answers table: ' . $db->error);
}

$sql = "
CREATE TABLE IF NOT EXISTS results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correct INT NOT NULL,
    total INT NOT NULL,
    datetime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

if (!$db->query($sql)) {
    die('Error creating results table: ' . $db->error);
}

// --------------------------------------------------
// Початкове наповнення таблиці questions
// --------------------------------------------------
$questionsCountResult = $db->query("SELECT COUNT(*) AS cnt FROM questions");
$questionsCountRow = $questionsCountResult->fetch_assoc();

if ((int)$questionsCountRow['cnt'] === 0) {
    $db->query("
        INSERT INTO questions (question, type) VALUES
        ('What does HTML stand for?', 'radio'),
        ('Which language is used for website styling?', 'radio'),
        ('Which tag is used to create a hyperlink?', 'radio')
    ");    
}

// --------------------------------------------------
// Початкове наповнення таблиці answers
// --------------------------------------------------
$answersCountResult = $db->query("SELECT COUNT(*) AS cnt FROM answers");
$answersCountRow = $answersCountResult->fetch_assoc();

if ((int)$answersCountRow['cnt'] === 0) {
    $db->query("
        INSERT INTO answers (answer, value, question_id) VALUES
        ('Hyper Text Markup Language', 1, 1),
        ('Home Tool Markup Language', 0, 1),
        ('Hyperlinks and Text Markup Language', 0, 1),

        ('CSS', 1, 2),
        ('PHP', 0, 2),
        ('MySQL', 0, 2),

        ('<a>', 1, 3),
        ('<link>', 0, 3),
        ('<href>', 0, 3)
    ");
}