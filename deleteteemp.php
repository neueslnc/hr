<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"]))
{
    header("location:login.php");
}
require ('development_mode_control.php') ;
$id= $_GET['id'] ;
if ($DB->query("DELETE FROM employers WHERE id = ?", array("$id")))
{
    header("location:all_emploers.php");
}
?>