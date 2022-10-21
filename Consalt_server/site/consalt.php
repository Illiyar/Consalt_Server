<?php
	session_start();
	include("../connection_db.php");
	if($_SESSION['username']){ 
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../style/style.css">
			<title>Admin</title>
		</head>
		<body>
			<form  method="post">
				<table border="1"><caption>Пользователи</caption><tr><th></th><th>id</th><th>Имя пользователя</th><th>Пароль</th></tr>
				<?php 
					$select_sql = "SELECT id, user_name, password FROM users;";
					$select_sql_result = mysqli_query($connection, $select_sql);
					$row = mysqli_fetch_array($select_sql_result);
					do{
						printf("<tr><td><input type='radio' name='user' value='%s'></td><td>%s</td><td>%s</td><td>%s</td>", $row['id'],
							$row['id'], $row['user_name'], $row['password']);
					}while ($row = mysqli_fetch_array($select_sql_result))
				?>
			</table>
			<input type="submit" value="Выбрать элемент" name="submit">
			<input type="submit" value="Добавить" name="submitInner">
			</form>
			<?php include('inner.php')?>
			<?php 
				if(isset($_POST['submit'])){
					if(!isset($_POST['user'])){
						echo "<script>alert('Вы не выбрали пользователя');</script>";
					}
					else{
						$id = $_POST['user'];
						$select_sql = "SELECT * FROM users WHERE id = $id";
						$select_sql_result = mysqli_query($connection, $select_sql);
						$row = mysqli_fetch_array($select_sql_result);
						printf("<div class='editDiv'>  
							<div class='alert alert-success' role='alert'>
							<form method='post' name='forma'>
							<input type='hidden' name='id'  value='%s'><br/>
							<label for='user_name'>Имя пользователя:</label><br/>
							<input type='text' name='user_name' size='30' value='%s'><br/>
							<label for='password'>Пароль:</label><br/>
							<input type='text' name='password' size='30' value='%s'><br/>
							<label for='access'>Доступ:</label><br/>
							<input type='text' name='access' size='30' value='%s'><br/>
							<label for='email'>Email:</label><br/>
							<input type='text' name='email' size='30' value='%s'><br/>
							<input id='submit' type='submit' name = 'remove' value='Редактировать запись'><br/>
							</form></div></div>",$row['id'], $row['user_name'], $row['password'], $row['access'], $row['email']);
					
					}
					
					
				}
			?>

			<?php
				if(isset($_POST['remove'])){
					$id = $_REQUEST['id'];
					$user_name = trim($_REQUEST['user_name']);
					$password = trim($_REQUEST['password']);
					$access = trim($_REQUEST['access']);
					$email = trim($_REQUEST['email']);
					$update_sql = "UPDATE users SET user_name = '$user_name', password = '$password', access = '$access', email='$email' WHERE id = '$id';";
					mysqli_query($connection, $update_sql) or die("Ошибка вставки".mysql_error());
					 echo "<div class='editDiv'>
							<div class='alert alert-success' role='alert'>
								<p>Изменения внесены успешно! Страница будет обновлена автоматически!</p>
							</div>
						</div>";
					header('Refresh: 2; URL=consalt.php');
					
				}
			 ?>
			 <form method="post">
			 	<input type="submit" name="addTasks" value="Добавить задание">	
			 </form>			 
			 <?php 
			 	if(isset($_POST['addTasks'])){
			 		echo("<div class='editDiv'>  
							<div class='alert alert-success' role='alert'>
							<form method='post' name='forma'>
							<p>Добавить задание</p>
							<textarea name='task' cols='65' maxlength='200'></textarea>
							<p><input type='date' name='date_time'></p>
							<p><input type='submit' name = 'add_task_button' value='Добавить задание'></p><br/>
							</form></div></div>");
			 	}
			  ?>
			  <?php 
			  	if(isset($_POST['add_task_button'])){
			  		$string_tasks = $_POST['task'];
			  		$date = $_POST['date_time'];
			  		$add_task_sql = "INSERT INTO tasks (id, Task, Data) VALUES ('', '$string_tasks', '$date')";
			  		$add_task_sql_result = mysqli_query($connection, $add_task_sql);
			  	}
			   ?> 
			<script src="bootstrap/jquery-3.5.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
		</body>
		</html>
		<?php
	}else{
		header("Location: ../index.php");
	}
?>
