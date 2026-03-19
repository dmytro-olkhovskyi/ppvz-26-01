<?php

    // DB Connection
    require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="./assets/style.css">
    </head>

    <body>
        <header class="header">
            <?php
                include './parts/header.php';
            ?>    
        </header>      

        <main class="wrapper">
            <aside class="sidebar">
                <?php
                    include './parts/sidebar.php';
                ?>
            </aside>

            <article class="content">
                <h4>Content</h4>

                <?php
                    $task = isset($_REQUEST['task']) ? filter_var($_REQUEST['task'], FILTER_SANITIZE_STRING) : 1;

                    // echo $task . '<br>';

                    switch ($task) {
                        case 1: 
                        case 2:
                        case 3:
                            include "./parts/content-{$task}.php";
                            break;
                        case "poll":
                        case "poll-results":
                            include "./parts/{$task}.php";
                            break;
                        default:
                            include './parts/content-notfound.php';
                    }

                    // if ($task == 1) {
                    //     include './parts/content-1.php';
                    // } else if ($task == 2) {
                    //     include './parts/content-2.php';
                    // }
                
                ?>
                
            </article>
        </main>
    </body>
</html>