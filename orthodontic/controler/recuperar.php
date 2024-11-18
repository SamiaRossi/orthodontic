<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</body>
<?php
include_once("../model/conect.php");
$email= $_POST['email'];

$query = "SELECT * FROM usuarios WHERE (email = '$email')"; // verificar se email existe
$sel = mysqli_query($conn,$query);
$linha = mysqli_fetch_array($sel);
$qnto = mysqli_num_rows($sel);

if ($qnto > 0) { //email já cadastrado, enviar a senha
	
		$destinatario = trim($_POST['email']);
		$assunto = "Recuperação de Senha";
		$msg = '<b>Senha de acesso ao Sistema de Sugestões:</b> '.$linha['senha']."\r\n";
		$header = 'From: samiarossi1914@gmail.com';
		mail($destinatario, $assunto, $msg, $header); // função para enviar o mail. Configurar Email function no php.ini

		echo "<script type='text/javascript'>
		swal({
		title: 'Mensagem!',
		text: 'Senha Enviada para seu Email!',
		type: 'success'
	}).then(function() {
		window.location = '../index.php';
	});</script>";

} else {  // email não cadastrado, solicitar novo cadastro
	echo "<script type='text/javascript'>
		swal({
		title: 'Email não localizado!',
		text: 'Cadastre-se novamente.',
		type: 'success'
	}).then(function() {
		window.location = '../index.php';
	});</script>";
	}
?>