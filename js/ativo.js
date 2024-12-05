$(document).ready(function(){
    $("#salvar_info").click(function(){
      let ativo = $("#ativo").val();
      let quantidade= $("#quantidade").val();
      let marca = $("#marca").val();
      let tipo = $("#tipo").val();
      let observacao = $("#observacao").val();
      let idAtivo = $("#idAtivo").val();
      //alert("aas");
      if(idAtivo==''){
        acao = 'inserir';

      }else{
        acao = 'update';
      }
 

    $.ajax({
        type: 'POST',
        url: "../controle/ativos_controller.php",
        data:{
            ativo:ativo,
            marca:marca,
            tipo:tipo,
            quantidade:quantidade,
            observacao:observacao,
            acao:acao
        },
        success: function(result){
      alertbt(result);
      
    }});
});
});


function muda_status(status,registro){
  $.ajax({
    type: 'POST',
    url: "../controle/ativos_controller.php",
    data:{
      acao:'alterar_status',
      status:status,
      idAtivo:registro
    },
    success: function(result){
  alert(result);
  location.reload();
  
}});
};