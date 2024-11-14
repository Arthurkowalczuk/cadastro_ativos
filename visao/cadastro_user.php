<?php
include_once('cabeçario.php');
?>



<body>

<section>
    <div class="form-box">
        <!-- Cabeçalho com imagem -->
        <div class="form-header">
            <img src="../imagens/senacb-removebg-preview (1).png" alt="Logo Senac" class="header-logo">
        </div>

        <div class="form-value">
            <h2>Cadastro de Usuário</h2>
            <form action="../controle/cadastro_user_controle.php" method="post">

                <div class="inputbox">
                    <input name="nome1" type="text" id="validationCustom01" placeholder=" " required>
                    <label for="validationCustom01">Primeiro nome</label>
                </div>

                <div class="inputbox">
                    <input name="nome2" type="text" id="validationCustom02" placeholder=" " required>
                    <label for="validationCustom02">Sobrenome</label>
                </div>

                <div class="inputbox">
                    <input name="user" type="text" id="validationCustomUsername" placeholder=" " required>
                    <label for="validationCustomUsername">Usuário</label>
                </div>

                <div class="inputbox">
                    <input name="sala" type="text" id="inputSala" placeholder=" " required>
                    <label for="inputSala">Número da Sala</label>
                </div>

                <div class="inputbox">
                    <input name="senha" type="password" id="inputPassword6" placeholder=" " required>
                    <label for="inputPassword6">Senha</label>
                </div>

                <div class="forget">
                    <label>
                        <input type="checkbox" id="invalidCheck2" required>
                        Concordo com os termos e condições
                    </label>
                </div>

                <button class="bt" type="submit">Salvar</button>


            </form>
        </div>
    </div>
</section>

</body>
</html>
