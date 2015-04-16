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
				<?php require("includes/connect.php"); 
				$mysqli = new mysqli('localhost', 'root', 'root', 'to-do list');
				$query = 'SELECT * FROM tasks ORDER BY date ASC, time ASC';
				if($result = $mysqli->query($query)){
					$numrows = $result->num_rows;
					if($numrows>0){
						while($row = $result->fetch_assoc()){
							$task_id = $row['id'];
							$task_name = $row["task"];

							echo "<li>
							<span>'.$task_name'
							";
						}
					}
				}
				?>
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
	//this function will fade a element when cliked on. the element will come from mt delete-task.php file. 
	$('delete-button').click(function(){
		var current_element = $(this);
		var task_id = $(this).attr('id');

		$.post('includes/delete-task.php', {id: task_id}, function(){
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	});
});
</script>
</html>