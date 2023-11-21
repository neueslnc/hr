<?php
header("Content-Type: application/javascript");
session_start();
if(!isset($_SESSION["session_username"]))
{
    header("location:login.php");
}
require ('development_mode_control.php') ;

$result = $DB->query("UPDATE `ehtiyoj` SET `". $_POST['column'] ."` = '". $_POST['value'] ."' WHERE id = ". $_POST['id'] );

echo json_encode($_POST);
