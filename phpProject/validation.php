<?php

$validoitu = false;
$number = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['checkInt'])) {
        $value = $_POST['eka'];
        if (filter_var($value, FILTER_VALIDATE_INT) == true) {
            $number = true;
        } else {
            $msg = "The input value ".$value." is NOT an integer";
        }
    }
}

?>