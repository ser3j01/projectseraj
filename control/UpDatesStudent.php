<?php
include '../db_conntent/db_helper.php';
header("Content-Type: application/json");

$db_helper = new DbHelper();
$db_helper->createDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_GET["id"] ;
    $name = $_GET["name"];
    $email = $_GET["email"];

        $db_helper->updateStudent($id, $name, $email);
}
?>
