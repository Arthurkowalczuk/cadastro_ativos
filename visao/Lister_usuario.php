<?php
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');

$info_bd = busca_info_bd($conexao, 'usuario');
include('cabeçario.php');
 
?>

<body>
    <div class="container"  >
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">User</th>
      <th scope="col">Turma</th>  
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($info_bd as $user){

      
    ?>
    
    <tr>
    
      <td>
        <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>">
        <?php echo $user['nomeUsuario'];?>
        </a>
      </td>
      <td>
      <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>">
        <?php echo $user['usuario'];?>
        </a>
    </td>
      <td>
      <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>">
        <?php echo $user['turmaUsuario'];?>
        </a> 
    </td>
    </tr>
    <?php
        }
    ?>
   
  </tbody>
</table>
Variantes
    </div>
</body>
</html>