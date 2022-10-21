<?php
	session_start();
	include("../connection_db.php");
	if($_SESSION['username']){ ?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<?php 
				$id = $_REQUEST['user'];
				$select_sql = "SELECT * FROM users WHERE id = $id";
				$select_sql_result = mysqli_query($connection, $select_sql);
				$row = mysqli_fetch_array($select_sql_result);
				printf("<form action='update.php' method='post' name='forma'>
				<input type='hidden' name='id'  value='%s'><br/>
				<label for='user_name'>Имя пользователя:</label><br/>
				<input type='text' name='user_name' size='30' value='%s'><br/>
				<label for='password'>Пароль:</label><br/>
				<input type='text' name='password' size='30' value='%s'><br/>
				<label for='access'>Доступ:</label><br/>
				<input type='text' name='access' size='30' value='%s'><br/>
				<label for='email'>Email:</label><br/>
				<input type='text' name='email' size='30' value='%s'><br/>
				<input id='submit' type='submit' value='Редактировать запись'><br/>
				</form>",$row['id'], $row['user_name'], $row['password'], $row['access'], $row['email']);
			?>
			
		</body>
		</html>
		<?php
	}else{
		header("Location: ../index.php");
	}
?>
