<?php
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$usuario_altera = $_GET['idUsuario'];
$info_bd = busca_info_bd($conexao,'usuario','idUsuario',$usuario_altera);
foreach($info_bd as $user){
    $nome = $user['nomeUsuario'];
    $turma = $user['turmaUsuario'];
    $id = $user['idUsuario'];
    include('cabeçario.php');
}
?>

<body>
    <div class="container">
        
        <form action="../controle/alterar_usuario_controle.php" method="POST">
            <input type="hidden" id="#" name="id" value="<?php echo $id ?>">
            <div class="mb-3">

                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Coloque seu nome" value="<?php echo $nome;?>">

            </div>
            <div class="mb-3">

                <label for="turma" class="form-label">Turma</label>
                <input type="text"  required name="turma" id="turma"  name="turma" value="<?php echo $turma;?>" placeholder="Informe sua turma"  class="form-control">
            </div>



            <button class="bt" type="submit">Salvar Alteração</button>

    
        </form>
    
    </div>
</body>
</html>

