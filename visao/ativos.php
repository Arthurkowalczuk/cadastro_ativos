<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Ativos</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <!-- Menu Lateral -->
  <div id="menu" class="menu">
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Cadastrar Ativo</a></li>
      <li><a href="#">Listar Ativos</a></li>
      <li><a href="#">Relatórios</a></li>
    </ul>
  </div>

  <!-- Conteúdo -->
  <div class="content">
    <h1>Cadastro de Ativos</h1>
    
    <!-- Formulário de Cadastro -->
    <form id="formCadastro" action="#" method="POST">
      <label for="nomeAtivo">Nome do Ativo:</label>
      <input type="text" id="nomeAtivo" name="nomeAtivo" required>
      
      <label for="tipoAtivo">Tipo do Ativo:</label>
      <input type="text" id="tipoAtivo" name="tipoAtivo" required>
      
      <label for="valorAtivo">Valor do Ativo:</label>
      <input type="number" id="valorAtivo" name="valorAtivo" required>
      
      <label for="dataCompra">Data de Aquisição:</label>
      <input type="date" id="dataCompra" name="dataCompra" required>

      <button type="submit">Cadastrar</button>
    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>
