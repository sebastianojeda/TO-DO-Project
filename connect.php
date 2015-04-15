<?php
//why is this important? why does localhost have to be first?
$mysqli = new mysqil('localhost', 'root', 'tasks');

//$mysqli->connect_error then we want it to die and have error message pop up
if($mysqli->connect_error){
	die('Connect Error ('. $mysqli->connect_errno . ')'
		. $mysqli->connect_error);
}else{
	echo "Connection made";
}
//Closes the $mysqli connection
$mysqli->close();
?>