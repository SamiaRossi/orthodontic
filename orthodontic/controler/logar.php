<?php
    include_once("../model/conect.php");
    $sql = "SELECT * FROM usuarios WHERE email = '" . $_POST['email2'] . "' AND senha = '" . $_POST['senha2'] . "'";
    $result = mysqli_query($conn,$sql);	
	$linha = mysqli_fetch_array($result); 
   
    if (!empty($linha)) { //verifica se o email E a senha estão corretos
					
					$email = $linha['email'];
					$senha = $linha['senha'];
                   
					echo "<script type='text/javascript'>
	  					    window.location = 'cookie.php?email=$email&senha=$senha'
	 					  </script>";
	 				exit;
    } else { //Se email OU senha incorreto(s)
                    $error = 'Email/Senha Inválido.';
					echo "<script type='text/javascript'>
	  					 window.location = '../index.php?error=$error'
	 					</script>";
	 				exit;
            }
?>