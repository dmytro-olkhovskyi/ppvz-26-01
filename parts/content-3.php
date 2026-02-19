<h2>Working with forms</h2>

<form action="<?= $_SERVER['PHP_SELF']?>" method="GET">
    <input type="hidden" name="task" value="<?= $task ?>">

    <label for="words">Input sentence: </label>
    <input type="text" name="words" placeholder="Input sentence">
    
    <button>Submit</button>
</form>

<hr>

<?php
    function countWords($str) {
        $arr = explode(' ', $str);

        $count = [];

        // Loop!
        if (isset($count[$arr[0]])) {
            $count[$arr[0]]++;
        } else {
            $count[$arr[0]] = 1;
        }

        return $count;
    }

    $words = isset($_GET['words']) ? filter_var($_GET['words'], FILTER_SANITIZE_STRING) : '';
    echo $words;

    if ($words) {
        //$raw_array = explode(' ', $words);
        //print_r($raw_array);

        $count = countWords($words);

        print_r($count);
    } else {
        echo 'Words is empty!';
    }