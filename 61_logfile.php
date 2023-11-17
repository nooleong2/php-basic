<?php
function logger($log) {
    if (!file_exists('log.txt')) {
        file_put_contents("log.txt", "");
    }

    $ip = $_SERVER["REMOTE_ADDR"]; // Client IP
    $time = date("Y-m-d H:m:s");

    $contents = file_get_contents("log.txt");
    $contents .= "$ip\t$time\t$log\r";

    file_put_contents("log.txt", $contents);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = $_POST["number"];

    if (!is_int($number)) {
        $log = "User entered incorrect type";
        logger($log);
    }

    if ($number != 5) {
        $log = "User entered incorrect number ($number)";
        logger($log);
    } else {
        $log = "User entered correct number ($number)";
        logger($log);
    }
}
?>

<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
    <input type="text" name="number"><br>
    <input type="submit">
</form>