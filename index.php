 <!DOCTYPE html>
<html>
<head>
	<title> Simple To-Do List </title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>

	<div class="wrap">
		<div class="task-list">
			<ul>
				<?php require("includes/connect.php"); ?>
			</ul>
		</div>
	</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new item..."/>			
	</form>

</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task();//calling add task function
	//This is my add_task function
	function add_task(){
		$('.add-new-task').submit(function(){
			var new_task = $('.add-new-task input[name=new-task]').val();
			//This if statement is ckecking if new_task is true or not  
			if(new_task != ''){
				$.post('includes/add-task.php', {task: new_task}, function(data){
					$('add-new-task input[name=new-task]').val();
						$(data).appendTo('task-list ul').hide().fadeIn();
				});
			}
			return false;
		});
	}
</script>
</html>