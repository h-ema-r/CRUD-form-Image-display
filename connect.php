<?php

$conn=new mysqli('localhost','root','admin','exam');

if($conn->connect_error){
    die("connection error".$conn->connect_error);
}


?>