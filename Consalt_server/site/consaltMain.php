<?php 
	if(isset($_POST['submit']) and $_FILES){
		$dir_find = "../drive/usersDocuments/".pathinfo($_FILES['file'], PATHINFO_FILENAME);
		if(!is_dir($dir_find)){
			echo "Директория не найдена";
			echo "$dir_find";
		}
		// move_uploaded_file($_FILES['file']['tmp_name'], '../drive/usersDocuments/'.$_FILES['file']['name']);
		else{
			echo "Директория найдена!";
		}
	}else{
		echo "Error!";
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Загрузка файла</title>
 </head>
 <body>
 	<form method="post" enctype="multipart/form-data">
 		<input type="file" name="file"><br>
 		<input type="submit" name="submit">
 	</form>
 </body>
 </html>