<?php
include '../db_conntent/db_helper.php';
header("Content-Type: application/json; charset=UTF-8");
$db_helper = new DbHelper();
$db_helper->createDbConnection();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $db_helper->getAllStudents();
}



?>
