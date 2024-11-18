<?PHP 
include_once("../model/conect.php");
$email = $_GET["email"];
$senha = $_GET["senha"];

 //EMAIL E SENHA CORRETOS, CRIAR COOKIES
		setcookie("email",$email,0, "/");	//o cookie vai valer até fechar o navegador em todos os diretorios do dominio
		setcookie("senha",$senha,0, "/");
   
		$query = "SELECT tipo FROM usuarios WHERE (email = '$email')"; 
		$sel = mysqli_query($conn,$query);
		$linha = mysqli_fetch_array($sel);
			
		if($linha['tipo'] == 1) { // se for usuario comum vai para pagina de sugestão com opção de votar e inserir nova
			echo "<script type='text/javascript'>
			window.location.href = '../sugestao.php';
			</script>";
		} else if($linha['tipo'] == 0) { //se for usuario ADM vai para pagina de alterar Status da Sugestão
			echo "<script type='text/javascript'>
			window.location.href = '../sugestao_adm.php';
			</script>";	
		}	
?>