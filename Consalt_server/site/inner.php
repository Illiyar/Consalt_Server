<?php 
include('../connection_db.php');
				if(isset($_POST['submitInner'])){
					print_r("<div class='editDiv'>  
							<div class='alert alert-success' role='alert'>
							<form method='post' name='formaInner'>
							<label for='id'>ID:</label><br/>
							<input type='text' name='id' size='30' ><br/>
							<label for='user_name'>Имя пользователя:</label><br/>
							<input type='text' name='user_name' size='30' ><br/>
							<label for='password'>Пароль:</label><br/>
							<input type='text' name='password' size='30'><br/>
							<label for='access'>Доступ:</label><br/>
							<input type='text' name='access' size='30' ><br/>
							<label for='email'>Email:</label><br/>
							<input type='email' name='email' size='30'><br/>
							<input id='submitInner' type='submit' name = 'innerValues' value='Добавить запись'><br/>
							</form></div></div>");
						
				}
				if(isset($_POST['innerValues'])){
							$id = $_POST['id'];
							$user_name = $_POST['user_name'];
							$password = $_POST['password'];
							$access = $_POST['access'];
							$email = $_POST['email'];
							$inner_sql = "INSERT INTO users (id, user_name, password, access, email) VALUES 
							('$id', '$user_name', '$password', '$access', '$email');";
							$inner_sql_result = mysqli_query($connection, $inner_sql);
							if($inner_sql_result){
								echo "Строки добавлены";
							}else{
								echo "Произошла непредвиденная ошибка!";
							}
						}
			?>