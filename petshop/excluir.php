<?php	
	$id =$_GET['id'];
	$pdo=new PDO('mysql:host=localhost;dbname=petshop;',  'root','');
	$sql = "DELETE FROM usuario WHERE idusuario = '$id'";
	$stmt= $pdo->prepare($sql);
	$stmt-> execute();
	header ('Location:index.php');





?>