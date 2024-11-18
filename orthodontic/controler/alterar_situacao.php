<?php
include_once("../model/conect.php"); //conecta ao banco

//recebe os parâmetros

    $id_sugestao = $_POST['id'];
	$id_usuario = $_POST['id_usuario'];
	$situacao = $_POST['situacao'];
	

	 try
	 {
		
		 //edita a situacao da sugestao na tabela sugestao
		$query = "UPDATE sugestao SET situacao='$situacao' WHERE id=$id_sugestao";
		$ln = mysqli_query($conn,$query);

		 //retorna 1 para no sucesso do ajax saber que foi com editado sucesso
		 echo "1";
	 } 
	 catch (Exception $ex)
	 {
		 //retorna 0 para no sucesso do ajax saber que foi um erro
		 echo "0";
	 }
?>