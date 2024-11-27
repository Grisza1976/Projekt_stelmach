<?php
$serwer = "localhost";
$user = "root";
$password = "";
$db = "biblioteka";

$conn = mysqli_connect($serwer,$user,$password,$db);
if(!$conn){
    die("Błąd".mysqli_connect_error());
}
?>