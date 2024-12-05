<?php
include_once('cabeçario.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('menu_lateral.php');
?>



<body>
  

    <div class="container" >
        <table class="table" >
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
        </table>
    </div>

</body>
