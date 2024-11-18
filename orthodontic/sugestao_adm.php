<?php 
include_once("model/conect.php"); 
include("controler/valida_cookies.php");
include("controler/conv_data.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugestao Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
  $(document).ready( function () {
    $('#myTable').DataTable({
         language: {
        url:"js/pt_br.json"
      },
      pageLength: 10,
      order:[3, 'desc'],
 })
});
</script>
<script type="text/javascript">
function alterar_situacao(situacao,id,id_usuario)
{
     pageurl = 'controler/alterar_situacao.php';
  
    $.ajax({
	
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: { situacao : situacao, id: id , id_usuario : id_usuario },  
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina,etc
        error: function(){
            alert('Erro: Alterado com sucesso!');
        },
        //retorna o resultado da pagina alterar_situacao.php
        success: function(result)
        { 
            //se situacao foi alterada com sucesso
            if($.trim(result) == '1')
            {
				//alert("a situacao foi alterada com sucesso!");
            }
            //se foi um erro
            else
            {
                alert("Ocorreu um erro ao alterar a situação!");
            }

        }
    });
}
</script>
  </head>
<?php
$dat = new dt();
$email=$_COOKIE["email"];
$query = "SELECT * FROM usuarios WHERE (email = '$email')"; // buscar dados do ususario logado e verificar se o tipo é ADM

$sel = mysqli_query($conn,$query);
$ln = mysqli_fetch_array($sel);
$id_usuario = $ln['id_usuario'];
$tipo = $ln['tipo'];

if ($tipo != 0){ //se tipo for diferente de zero, significa que é usuário comum 
  echo "<SCRIPT Language='javascript'>
  alert('Acesso Negado. ');
  location.href='index.php';
  </SCRIPT>";

}
?>

<body>

    <!-- Cabeçalho -->
    <header>
        <div class="container">
            <div class="logo">
            <h1>Olá, <?php echo $ln["nome"]; ?></h1>
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
      <h2><br>Sugestões Cadastradas!</h2>
        
      <table id="myTable" class="display">
        <thead>
          <tr>
          <th align="center">Título</th>  
          <th align="center">Sugestão</th>
          <th align="center">Data</th>
          <th align="center">Votos</th>
          <th align="center">Situação<th>
          </tr>
        </thead>
<?php
    $query = "SELECT * FROM sugestao WHERE id>0 ORDER BY dt_cadastro DESC "; // buscar todas as Sugestões por ordem da data  MAIS recente para a MAIS antiga
    $sel = mysqli_query($conn,$query) or die(mysqli_error());   
    while($linha = mysqli_fetch_array($sel,MYSQLI_BOTH)){
      $data1=  $dat->inverte($linha['dt_cadastro']);
      $id_sugestao = $linha['id'];
?>
          <tr>
            <td align="left"><?php echo $linha['titulo'];?></td>
            <td align="left"><?php echo $linha['sugestao'];?></td>
            <td align="left"><?php echo $data1;?></td>
            <td align="center"><?php echo $linha['qtd_votos'];?></td>
            <td align="center">
            <form method="POST">
            <select name="situacao" id="situacao" onchange="alterar_situacao(this.options[this.selectedIndex].value,<?php echo $linha['id'];?>,<?php echo $ln['id_usuario'];?>)">
              <option value="Pendente" <?php if (($linha['situacao']) == "Pendente") echo "selected"; ?>>Pendente</option>
              <option value="Aprovada" <?php if (($linha['situacao']) == "Aprovada") echo "selected"; ?>>Aprovada</option>
              <option value="Rejeitada" <?php if (($linha['situacao']) == "Rejeitada") echo "selected"; ?>>Rejeitada</option>
              <option value="Em Desenvolvimento" <?php if (($linha['situacao']) == "Em Desenvolvimento") echo "selected"; ?>>Em Desenvolvimento</option>
            </select>
            </form>
            </td>
          </tr>
<?php 
}
?>
</tbody>
    </table>
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