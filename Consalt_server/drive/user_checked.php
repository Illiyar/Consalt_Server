<?php
$error = " ";
if(isset($_POST['submit'])){
	$iin = $_POST['login'];
	$password = $_POST['password'];
	include('../connection_db.php');
	$query = "SELECT client_user.id, contracts.IIN, client_user.user_password from contracts, client_user WHERE iin LIKE $iin and client_user.id like contracts.iin;";
	$query_result = mysqli_query($connection, $query);
	if(!$query_result){
		echo 'Введенные данные не верны! Вы будете автоматически перенаправлены!';
			header('Refresh: 3; URL=index.php');
		}else{
			list($get_iin, $get_id, $get_password) = mysqli_fetch_row($query_result);
	
			if(mysqli_num_rows($query_result)){
				if($get_password == $password and $get_id == $iin){
					session_start();
					$_SESSION['client_user'] = $iin;
					header("Location: usersDocuments/index.php");
				}else{
					echo 'Введенные данные не верны! Вы будете автоматически перенаправлены!';
					header('Refresh: 3; URL=index.php');
				}
			}else{
				echo "Введенные данные не верны! Вы будете автоматически перенаправлены!";
				header('Refresh: 3; URL=index.php');
			}
		}
	
}
?>