<?php
include_once("../model/conect.php"); //conecta ao banco
//recebe os parâmetros
if (isset($_POST['id'])) {
    $id_sugestao = $_POST['id'];
	$id_usuario = $_POST['id_usuario'];
}
	 try
	 {
			
		//insere o voto na tabela votação
		$sql = "INSERT INTO votacao (id_usuario, id_sugestao) VALUES ('".trim($id_usuario)."','".trim($id_sugestao)."')";
		$result = mysqli_query($conn,$sql);
		
		 //atualiza quantidade de votos na tabela sugestao
		$query = "UPDATE sugestao SET qtd_votos=(qtd_votos + 1) WHERE id=$id_sugestao";
		$ln = mysqli_query($conn,$query);

		 //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
		 echo "1";
	 } 
	 catch (Exception $ex)
	 {
		 //retorna 0 para no sucesso do ajax saber que foi um erro
		 echo "0";
	 }
?>