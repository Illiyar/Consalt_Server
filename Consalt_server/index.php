<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Server Consalt</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/styleIndex.css">
	
</head>
<body>
	<div class="editDiv1">
		<div class="container img-thumbnail">
		<div class="text-center">
		  <img src="sources/img/imageINdex.png" class="image-fluid" alt="...">
		</div>
		<form method="POST" action="connection.php">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Имя пользователя</label>
		    <input type="text" class="form-control" id="exampleLogin" aria-describedby="emailHelp" name="login">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Пароль</label>
		    <input type="password" class="form-control" id="examplePassword" name="password">
		  </div>
		  <div class="text-center">
		  <button type="submit" class="btn btn-primary" name="submit" id="button">Войти</button>
		</div>
		<div class="text-center" id="textPadding">
		  <p><a href="site/loginHelp.php">Проблемы со входом?</a></p>
		</div>
		</form>
		</div>
	</div>
	<script src="bootstrap/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>