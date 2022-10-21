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
				$id = $_REQUEST['id'];
				$user_name = trim($_REQUEST['user_name']);
				$password = trim($_REQUEST['password']);
				$access = trim($_REQUEST['access']);
				$email = trim($_REQUEST['email']);
				$update_sql = "UPDATE users SET user_name = '$user_name', password = '$password', access = '$access', email='$email' WHERE id = '$id';";
				mysqli_query($connection, $update_sql) or die("Ошибка вставки".mysql_error());
				echo "Запись успешно добавлена";
				
			?>
		</body>
		</html>
		<?php
	}else{
		header("Location: ../index.php");
	}
?>
