// Detecta o movimento do mouse para exibir o menu lateral
document.addEventListener('mousemove', (event) => {
    const menu = document.getElementById('menu');
  
    if (event.clientX < 50) {
      menu.classList.add('open');  // Mostra o menu quando o mouse está perto da borda esquerda
    } else {
      menu.classList.remove('open');  // Esconde o menu quando o mouse sai da área
    }
  });
  
  //para sair da conta 
function logoutUser() {
  Swal.fire({
    title: "Tem certeza?",
    text: "Você será desconectado da sessão atual.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Sim, sair",
    cancelButtonText: "Cancelar"
  }).then((result) => {
    if (result.isConfirmed) {
    
      window.location.href = '../controle/logOut_controle.php'; 
    }
  });
}



function aparecermenu() {
  document.getElementById('ativ').style.display = 'block'; // Exibe o menu
}

function escondermenu() {
  document.getElementById('ativ').style.display = 'none'; // Esconde o menu
}



function alertbt() {
  Swal.fire({
    position: "center", 
    icon: "success",
    title: " Operação concluída com sucesso! ",
    background: "#F5F5F5",
    color: "#333", 
    confirmButtonColor: "#ff4757", // Cor do botão de confirmação
    showConfirmButton: false,
    timer: 2000 // Duração do alerta
  }).then(() => {
    // Após o alerta, recarrega a página
    location.reload();
  })
}


function alerterro() {
  SSwal.fire({
    position: "center",
    icon: "error",
    title: "ERROR",
    background: "#F5F5F5", // Cor de fundo personalizada
    color: "#333", // Cor do texto
    text: "A operação não pôde ser realizada. Verifique os dados e tente novamente.",
    footer: '<a href="#">Why do I have this issue?</a>',

  }).then(() => {
    // Após o alerta, recarrega a página
    location.reload();
  });
}



//Create an instance of Notyf
//var notyf = new Notyf();


// Display an error notification
//notyf.error('Verifique os dados e tente novamente.');

// Display a success notification
//notyf.success('Operação concluída!');




