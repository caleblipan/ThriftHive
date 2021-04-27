<?php
$servername = "localhost";
$db_username = "Caleb_Lipan";
$db_password = "Caleb_Lipan2021";
$db_name = "ThriftHive";

$con = mysqli_connect($servername,$db_username,$db_password,$db_name);

if(!$con) {
    die("Error connecting to database: ".mysqli_connect_error());
}
?>