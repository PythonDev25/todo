<?php
$con = mysqli_connect("localhost", "root", "", "todo");
if (!$con) {
    die('connecton echoue' . mysqli_connect_error());
}
?>