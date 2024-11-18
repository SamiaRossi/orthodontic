<?php 
include_once("model/conect.php"); 
include("controler/valida_cookies.php");
$email=$_COOKIE["email"];
$query = "SELECT nome FROM usuarios WHERE (email = '$email')"; // buscar o nome pra colocar no olá
$sel = mysqli_query($conn,$query);
$linha = mysqli_fetch_array($sel);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugestão</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="container">
            <div class="logo">
            <?php echo $linha["nome"]; ?>
            </div>
            <nav>
                <ul>
                    <li><a href="controler/logout.php">Sair</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section class="section">
        <div class="container">
            <h2>Cadastro de Sugestões</h2><br>
            <form action="controler/salvar_sugestao.php?email=<?php echo $email;?>" method="post">
            <input type="text" id="titulo" name="titulo" placeholder="Título" required />    
            <textarea name="sugestao" id="sugestao" placeholder="Sua mensagem" rows="10" required></textarea>
                <br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Rodapé -->
    <footer>
        <div class="container">
            <p>&copy; 2024  | Todos os direitos reservados</p>
            
        </div>
    </footer>
</body>
</html>
