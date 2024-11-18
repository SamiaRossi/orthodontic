<?php
include("model/conect.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <script language="javascript" src="js/validacoes.js"></script>
  <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
  <div class="container">
    <div class="buttonsForm">
      <div class="btnColor"></div>
      <button id="btnSignin">Logar</button>
      <button id="btnSignup">Cadastrar</button>
    </div>

    <form id="signin" method="post" action="controler/logar.php">
      <input type="text" id="email2" name="email2" placeholder="Email" required />
      <i class="fas fa-envelope iEmail2"></i>
      <input type="password" id="senha2" name="senha2" placeholder="Senha" required />
      <i class="fas fa-lock iPassword2"></i>
      <div class="text">
        <span>
            <?php 
                if (!empty($_GET["error"])) {
                        $msg = $_GET["error"];
                        echo $msg; 
                }
            ?>
        </span>
      </div>
      <a href="senha.php">Recuperar Senha</a>
      <button type="submit">Entrar</button>
    </form>

  <form id="signup" method="post" action="controler/cadastrar.php">
  <input type="text" id="nome" name="nome" placeholder="Nome" required />
  <i class="fas fa-user iNome"></i>  
      <input type="text" id="email" name="email" placeholder="Email" onblur="validacaoEmail(signup.email)" required />
      <i class="fas fa-envelope iEmail"></i>
      <div id="msgemail"></div>
      <input type="password" id="senha" name="senha" placeholder="Senha" onKeyUp="verificaForcaDaSenha(signup.senha);" required />
      <i class="fas fa-lock iPassword"></i>
      <div id="mensagem"></div>
      <button type="submit">Salvar</button>
    </form>
  </div>

  <script src="js/index.js"></script>
  
</body>
</html>