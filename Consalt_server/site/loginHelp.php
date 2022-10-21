<?php 
	include('../connection_db.php');	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Забыли пароль?</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style/styleIndex.css">
</head>
<body>
	<div class="editDiv1">
		<div class="container img-thumbnail">
		<form method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Имя пользователя</label>
		    <input type="text" class="form-control" id="exampleLogin" aria-describedby="emailHelp" name="loginHelp">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Email</label>
		    <input type="email" class="form-control" id="examplePassword" name="emailHelp">
		  </div>
		  <div class="text-center">
		  <button type="submit" class="btn btn-primary" name="restore" id="button">Восстановить</button>
		</div>
		</form>
		</div>
	</div>
	<?php 
		if(isset($_POST['restore'])){

			$user_name = trim($_POST['loginHelp']);
			$email = trim($_POST['emailHelp']);
			$query_connection = "SELECT user_name, email FROM users WHERE user_name = '".$user_name."';";
			$query_connection_result = mysqli_query($connection, $query_connection);
			list($username, $emailuser) = mysqli_fetch_row($query_connection_result);
			if(mysqli_num_rows($query_connection_result)){
				if($emailuser == $email){
					init_set('display_errors', 1);
					error_reporting(E_ALL);
					$from = ''
					echo "На ваше email отправлен новый пароль";
				}
				else{
					echo "Не предвиденная ошибка!";
				}
			}else{
				echo "Email не найден!";
			}



		}
	?>
	<script src="../bootstrap/jquery-3.5.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
