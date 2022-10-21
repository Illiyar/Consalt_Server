<?php
$error = " ";
if(isset($_POST['submit'])){
	$name = $_POST['login'];
	$password = $_POST['password'];
	include('connection_db.php');
	$query = "SELECT user_name, password FROM users WHERE user_name = '".$name."';";
	$query_result = mysqli_query($connection, $query);
	list($username, $pass) = mysqli_fetch_row($query_result);
	if(mysqli_num_rows($query_result) == 1){
		if($pass == $password){
			session_start();
			$_SESSION['username'] = $name;
			echo $_SESSION['username'];
			header("Location: site/consalt.php");
		}else{
			echo 'Введенные данные не верны! Вы будете автоматически перенаправлены!';
			header('Refresh: 3; URL=index.php');
		}
	}else{
		echo "Введенные данные не верны! Вы будете автоматически перенаправлены!";
		header('Refresh: 3; URL=index.php');
	}
}
?>