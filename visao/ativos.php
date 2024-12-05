<?php
include_once('cabeçario.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('menu_lateral.php');

$marcas = busca_info_bd($conexao, 'marca');
$tipos = busca_info_bd($conexao, 'tipo');

$sql = "SELECT 
    idAtivo,
    descricaoAtivo,
    quantidadeAtivo,
    statusAtivo,
    ObservacaoAtivo,
    (SELECT descricaoMarca from marca m WHERE m.idMarca = a.idMarca) as marca,
    (SELECT descricaoTipo from tipo t WHERE t.idTipo = a.idTipo) as tipo,
    (SELECT usuario from usuario u WHERE u.idUsuario = a.idUsuario) as usuario,
    idTipo,
    dataCadastro,
    idUsuario 
FROM ativo a";

$result = mysqli_query($conexao, $sql) or die(false);
$ativo_bd = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Incluir a biblioteca SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="../js/ativo.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<body>
    
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Abrir modal</button>
   
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Observação</th>  
                    <th scope="col">Marca</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Data</th>  
                    <th scope="col">Usuário</th>  
                    <th  style="text-align:center"  scope="col">Ações</th> <!-- Coluna para os ícones de editar e deletar -->
                </tr>
            </thead>
            <tbody>
    <?php
        foreach($ativo_bd as $ativo){
    ?>
        <tr>
            <td><?php echo $ativo['descricaoAtivo']; ?></td>
            <td><?php echo $ativo['quantidadeAtivo']; ?></td>
            <td><?php echo $ativo['ObservacaoAtivo']; ?></td>
            <td><?php echo $ativo['marca']; ?></td>
            <td><?php echo $ativo['tipo']; ?></td>
            <td><?php echo $ativo['dataCadastro']; ?></td>
            <td><?php echo $ativo['idUsuario']; ?></td>
            <td>
            <div style="display: flex; justify-content: space-between; align-items: center;">       
           
                <!-- Ícone de editar -->
                <button class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal<?php echo $ativo['idAtivo']; ?>'>
                    <i class='fas fa-edit'></i> Editar
                </button>
                
                <!-- Ícone de deletar -->
                <button class='btn btn-danger' onclick='confirmDelete("<?php echo $ativo['idAtivo']; ?>")'>       
                  <i class='fas fa-trash'></i> Deletar
      </button>
                <div class='muda_status'>
                    <?php
                    if($ativo['statusAtivo'] == 'S') {
                    ?>
                        <div class='inativo' onclick="muda_status('N','<?php echo $ativo['idAtivo'];?>')">
                            <i class='bi bi-toggle-off'></i>
                        </div>
                    <?php
                    } else {
                    ?>  
                        <div class='ativo'  onclick="muda_status('S','<?php echo $ativo['idAtivo'];?>')">
                            <i class='bi bi-toggle-on'></i>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                </div>
            </td>
        </tr>
    <?php
        }
    ?>
</tbody>

        </table>
        <input type="hidden" id="idAtivo" value="" >
    </div>
    <a href="exportar_csv.php">
        <button class="btn btn-secondary">Exportar CSV</button>
    </a>

    <!-- Passo 3: Modal de Edição -->
    <?php foreach($ativo_bd as $ativo): ?>
    <div class="modal fade" id="editModal<?php echo $ativo['idAtivo']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Ativo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editar_ativo.php" method="POST">
                        <div class="mb-3">
                            <label for="descricaoAtivo" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricaoAtivo" name="descricaoAtivo" value="<?php echo $ativo['descricaoAtivo']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantidadeAtivo" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="quantidadeAtivo" name="quantidadeAtivo" value="<?php echo $ativo['quantidadeAtivo']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="observacaoAtivo" class="form-label">Observação</label>
                            <textarea class="form-control" id="observacaoAtivo" name="observacaoAtivo"><?php echo $ativo['ObservacaoAtivo']; ?></textarea>
                        </div>
                        <input type="hidden" name="idAtivo" value="<?php echo $ativo['idAtivo']; ?>">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Script para o modal de confirmação -->
    <script>
        function confirmDelete(idAtivo) {
            Swal.fire({
                title: "Tem certeza?",
                text: "Você realmente deseja excluir este item?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sim, excluir",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Criar o formulário dinamicamente e enviá-lo
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'deletar_ativo.php';

                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'idAtivo';
                    input.value = idAtivo;

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
    

</body>

<?php
include_once('modal_ativo.php');
?>
<?php
// Verificar se o parâmetro de sucesso ou erro foi passado
$status = isset($_GET['delete']) ? $_GET['delete'] : '';
$editn = isset($_GET['edit']) ? $_GET['edit'] : '';
?>

<!-- Inclua a biblioteca Notyf -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.css"/>

<script>
// Criar uma instância do Notyf
var notyf = new Notyf();

<?php if ($status === 'success') { ?>
    // Exibir mensagem de sucesso
    notyf.success('Item excluído com sucesso!');
<?php } elseif ($status === 'error') { ?>
    // Exibir mensagem de erro
    notyf.error('Erro ao excluir o item.');
<?php } ?>

<?php if ($editn === 'success') { ?>
    // Exibir mensagem de sucesso
    notyf.success('Alteração salva com sucesso!');
<?php } elseif ($editn === 'error') { ?>
    // Exibir mensagem de erro
    notyf.error('Erro ao salvar as alterações. Tente novamente.');
<?php } ?>
</script>
