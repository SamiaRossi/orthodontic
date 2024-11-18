<?php 
include_once("model/conect.php"); 
include("controler/valida_cookies.php");
include("controler/conv_data.php");
$dat = new dt();
$email=$_COOKIE["email"];
$query = "SELECT * FROM usuarios WHERE (email = '$email')"; // buscar dados do ususario logado
$sel = mysqli_query($conn,$query);
$ln = mysqli_fetch_array($sel);
$id_usuario = $ln['id_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugesão</title>
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
      pageLength: 5,
      order:[3, 'desc'],
      responsive: true,
      paging: true,
      searching: true,
      ordering:  false,
      info: false,
      bLengthChange: false,
      columns: [null,null,null,null,null],
      
 })
});
</script>
<script type="text/javascript">
function inserir_voto(id,id_usuario)
{

    pageurl = 'controler/salvar_voto.php';
  
    $.ajax({
	
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: { id: id , id_usuario : id_usuario},  
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina,etc
        error: function(){
            alert('Erro: Voto não computado!!');
        },
        //retorna o resultado da pagina salvar_voto.php
        success: function(result)
        { 
            //se voto foi inserido com sucesso
            if($.trim(result) == '1')
            {
				//alert("O seu voto foi computado com sucesso!");
            }
            //se foi um erro
            else
            {
                alert("Ocorreu um erro ao inserir o seu voto!");
            }

        }
    });
}
</script>
  </head>
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
      <h2><br>Vote em nossas Sugestões!</h2>
       <div align="right"><a href="cad_sugestao.php"><img src="css/img/registro.png"></a><br>Cadastrar Sugestão</div>    
      <table id="myTable" class="display">
        <thead>
          <tr>
          <th align="center">Título</th>  
          <th align="center">Sugestão</th>
          <th align="center">Data</th>
          <th align="center">Votos</th>
          <th align="center"> Votar<th>
          </tr>
        </thead>
<?php
    $query = "SELECT * FROM sugestao WHERE situacao='Aprovada' ORDER BY qtd_votos DESC "; // buscar todas as Sugestões APROVADAS por ordem de MAIS votada para MENOS votada
    $sel = mysqli_query($conn,$query) or die(mysqli_error());   
    while($linha = mysqli_fetch_array($sel,MYSQLI_BOTH)){
      $data1=  $dat->inverte($linha['dt_cadastro']);
      $id_sugestao = $linha['id'];
      $id_usuario_sugestao = $linha['id_usuario'];
     
      // verificar se usuario já votou nessa sugestão, se sim desabilitar e alterar texto do botão Votar 
		$query1 = "SELECT * FROM votacao WHERE (id_usuario = '$id_usuario' and id_sugestao = '$id_sugestao')"; 
    $sel1 = mysqli_query($conn,$query1);
		$linha1 = mysqli_fetch_array($sel1);
		$qnto = mysqli_num_rows($sel1);
    
    if($qnto > 0) {
      $habilita="disabled";
      $texto="Já votei";
     
    } else if($qnto == 0){
      $habilita="";
      $texto="Votar";
     
    }
     //verifica se a sugestão foi cadastrada pelo usuário logado, se sim, desabilita e botão de votar e altera o texto  
     if ($id_usuario == $id_usuario_sugestao) {
      $habilita="disabled";
      $texto="Minha Sugestão";
} 
?>
          <tr>
            <td align="left"><?php echo $linha['titulo'];?></td>
            <td align="left"><?php echo $linha['sugestao'];?></td>
            <td align="left"><?php echo $data1;?></td>
            <td align="center"><?php echo $linha['qtd_votos'];?></td>
            <td align="center">
              <form method="post">
                <button id="botao" type="submit" <?php echo $habilita;?> onclick="inserir_voto(<?php echo $linha['id'];?>,<?php echo $ln['id_usuario'];?>)"><?php echo $texto;?></button>
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