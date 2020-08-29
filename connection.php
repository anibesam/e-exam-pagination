<?php
$server='localhost';
$uname='root';
$password='2344454';
$dbase='my_cbt';
$con = new mysqli($server,$uname,$password,$dbase);
//Eror Handler
if($con->connect_error){
	printf("Connection Failed: %s\n",$con->connect_error);
	exit();
}
