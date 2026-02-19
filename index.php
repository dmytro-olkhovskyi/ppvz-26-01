<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Intro</title>
</head>
<body>
    <?php

        echo "<h1>Hello from PHP!</h1>";
        $name = 'Dmytro';

        echo '<p>My name is ' . $name . '</p>';
        echo '<p>My name is {$name}</p>';
        echo "<p>My name is {$name}</p>";
    ?>

    <p>My name is 
        <?php echo $name; ?>
    </p>

    <p>My name is <?= $name ?></p>

    <hr>

    <table>
        <?php
            for ($i = 1; $i<4; $i++) {
                echo '<tr>';
                    for ($j = 1; $j<4; $j++) {
                        echo '<td>' . $j*$i . '</td>';
                    }
                echo '</tr>';
            }
        ?>
    </table>

    <hr>

    <?php

        // $arr = array('apple', 'pineapple', 'pear');
        $arr = ['apple', 'pineapple', 'pear'];
        print_r($arr);
        $arr[] = 'cucumber';
        print_r($arr);
        unset($arr[1]);
        print_r($arr);

        echo '<hr>';

        $numbers = []; // array();
        for ($i=0; $i<10; $i++) {
            $numbers[] = rand(-100, 100);

            echo "numbers[$i] = " . $numbers[$i] . "<br>";
        }

        $sum = 0;
        for ($i=0; $i<10; $i++) {
            $sum += $numbers[$i];
        }
        echo "Summ = " . $sum;
    ?>

</body>
</html>