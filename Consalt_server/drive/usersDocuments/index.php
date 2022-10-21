<?php 
include("../../connection_db.php");
	session_start();
	$query = "SELECT name, LastName, iin FROM contracts WHERE iin LIKE'".$_SESSION['client_user']."';";
	$query_result = mysqli_query($connection, $query);
	list($get_name, $get_last_name, $get_iin) = mysqli_fetch_row($query_result);
	if($_SESSION['client_user']){
		$path = scandir('../usersDocuments');
		// foreach ($path as $f) {
		// 	$pat_info = pathinfo($f, PATHINFO_FILENAME);
		// 	if($f != '.' and $f != '..'){
		// 			if($get_name."_".$get_last_name == $pat_info){
		// 				echo "<a href='$f'>".$f."</a><br>";
		// 			}
		// 	}
		// }
	}else{
		header("Location: ../index.php");
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 			<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../../style/style.css">
 	<title>Ваши документы</title>
 </head>
 <body>
 	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя файла</th>
      <th scope="col">Размер</th>
      <th scope="col">Состояние оценки</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    	$i = 1;
		foreach ($path as $f) {
					$pat_info = pathinfo($f, PATHINFO_FILENAME);
					if($f != '.' and $f != '..'){
							if($get_name."_".$get_last_name == $pat_info){
								printf("<tr><th scope = 'row'>%s</th><td><a href='%s'>".$f."</a></td>
									<td>sdsd</td><td>qweert</td></tr>", $i, $f);
								$i++;
							}
					}
				}

     ?>
  </tbody>
</table>
			<script src="bootstrap/jquery-3.5.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>