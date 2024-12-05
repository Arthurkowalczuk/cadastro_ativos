<?php
include_once('../controle/controle_session.php');
include_once('cabeçario.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Ativos</title>
  <link rel="icon" href="../imagens/icone.png" type="image/x-icon">
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Link para o Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
  <style>
    .men{
      color: white;
    }
    .roda {
      color:  #575757;
      margin-top: 650px;
    }

    .lg img {
      width: 200px;
      height: 150px;
    }

    .menu {
      background: url('../imagens/senac7.PNG');
    }
  
.Btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: rgb(255, 65, 65);
}

/* plus sign */
.sign {
  width: 100%;
  transition-duration: .3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 17px;
}

.sign svg path {
  fill: white;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: .3s;
}
/* hover effect on button width */
.Btn:hover {
  width: 125px;
  border-radius: 40px;
  transition-duration: .3s;
}

.Btn:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.Btn:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.Btn:active {
  transform: translate(2px ,2px);
}
  </style>

  <!-- Menu Lateral -->
  <div id="menu" class="menu">
    <div  id="lg"  class="lg">
      <img src="../imagens/senacb-removebg-preview (1).png" alt="Logo Senac">
    </div>
    <div   onmouseenter="aparecermenu();" onmouseleave="escondermenu();" class="men">
    <a href="#">Ativos</a>
    <ul id="ativ" >
      
      <li class="ativos"><a href="ativos.php">Listar Ativos</a></li>
      <li class="sobre"><a href="sobre.php">Sobre</a></li>
      <li class="movimentacao"><a href="movimentacao.php">Movimentações</a></li>
    </ul>
    
    
  </div>
    
  <button class="Btn" onclick="logoutUser()">
    <div class="sign">
        <svg viewBox="0 0 512 512">
            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
        </svg>
    </div>
    <div class="text">Logout</div>
</button>

   
    <div class="roda">
      <footer>
        <p>&copy; Cadastro de Ativos SENAC - Gestão eficiente de recursos.</p>
      </footer>
    </div>
  </div>

 



 <script  src="../js/script.js"></script>
  <!-- Link dos Scripts do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
