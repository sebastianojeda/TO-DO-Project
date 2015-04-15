<?php
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = time('H:i:s');

	include('connect.php');


	$mysqli = new mysqli('localhost', 'root', 'root', 'to-do list');
	$mysqli ->query("INSERT INTO task VALUES ('', '$task', '$date', '$time')");

	$query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time' ";



?>