function submitData() {
  console.log("Iniciando envio...");

  var data = {
    id_cliente: $("#id_cliente").val(),
    data_retirada: $("#data_retirada").val(),
    data_devolucao: $("#data_devolucao").val(),
    valor_locacao: $("#valorlocinput").val(),
    categoria: $("#meu_select").val(),
    action: "solicita" 
  };

  $.ajax({
    url: 'solicitafunctionCliente.php',
    type: 'post',
    data: data,
    success: function (response) {
      if (response.trim() === "Solicitação Successful") {
        Swal.fire({
          icon: 'success',
          title: 'Sucesso!',
          text: 'Solicitação realizada com sucesso!'
        });

        $('.formularioLocacao')[0].reset();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Erro!',
          text: response 
        });
      }
    },
    error: function() {
      Swal.fire({
        icon: 'error',
        title: 'Erro de Conexão',
        text: 'Não foi possível se comunicar com o servidor.'
      });
    }
  });
}