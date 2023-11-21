<?php
require("dat.php");
require("PDO.class.php");
$DB = new Db(DBHost, DBPort, DBName, DBUser, DBPassword);
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,

];
try 
{
$conn = new PDO($dsn,$user,$pass,$opt);
}
catch(  PDOException $e  )
{
    // echo "You have an error: ".$e->getMessage()."<br>";
    // echo "On line: ".$e->getLine();
}
?>

	
	