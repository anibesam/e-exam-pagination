<?php
$server='localhost';
$username='root';
$password='234';
$database='my_cbt';
$connection = new mysqli($server,$uname,$password,$dbase);
//Eror Handler
if($con->connect_error){
	printf("Connection Failed: %s\n",$con->connect_error);
	exit();
}
