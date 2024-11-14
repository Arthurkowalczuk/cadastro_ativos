// Detecta o movimento do mouse para exibir o menu lateral
document.addEventListener('mousemove', (event) => {
    const menu = document.getElementById('menu');
  
    if (event.clientX < 50) {
      menu.classList.add('open');  // Mostra o menu quando o mouse está perto da borda esquerda
    } else {
      menu.classList.remove('open');  // Esconde o menu quando o mouse sai da área
    }
  });
  
  // Lógica do formulário de cadastro (apenas um exemplo)
  document.getElementById('formCadastro').addEventListener('submit', function(event) {
    event.preventDefault();  // Impede o envio do formulário
  
    // Coleta os dados do formulário
    const nomeAtivo = document.getElementById('nomeAtivo').value;
    const tipoAtivo = document.getElementById('tipoAtivo').value;
    const valorAtivo = document.getElementById('valorAtivo').value;
    const dataCompra = document.getElementById('dataCompra').value;
  
    // Aqui você pode enviar os dados para um banco de dados ou processá-los de alguma forma
    console.log('Ativo Cadastrado:', nomeAtivo, tipoAtivo, valorAtivo, dataCompra);
  
    // Limpa os campos após o cadastro
    document.getElementById('formCadastro').reset();
    alert('Ativo cadastrado com sucesso!');
  });
  