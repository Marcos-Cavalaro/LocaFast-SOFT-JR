document.getElementById('telefone').addEventListener('input', function (event) {
      let inputValue = event.target.value.replace(/\D/g, ''); 
      inputValue = inputValue.substring(0, 11); 

      if (inputValue.length > 10) {
        inputValue = inputValue.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
      } else if (inputValue.length > 6) {
        inputValue = inputValue.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
      } else if (inputValue.length > 2) {
        inputValue = inputValue.replace(/(\d{2})(\d{0,5})/, '($1) $2');
      }

      event.target.value = inputValue;
    });

function pegaCategoria(categoria) {
  console.log(categoria);
  document.getElementById('categoria-show').value = categoria;
  categoriafim = categoria;
  console.log("categoria fim: ", categoriafim)
}

//----------------------------------------------------------------------------------------------------------------------------------// 

calculo()

function calculo() {
  const data_retirada = document.getElementById('data_retirada');
  const data_devolucao = document.getElementById('data_devolucao');

  data_devolucao.addEventListener('change', function () {
    var conversivel = 150.00;

    var dataUm = new Date(document.getElementById("data_retirada").value);
    var dataDois = new Date(document.getElementById("data_devolucao").value);
    valorDias = parseInt((dataDois - dataUm) / (24 * 3600 * 1000));

    valorFinal = valorDias * conversivel

    const data_devolucao = document.querySelector('#data_devolucao');

    data_devolucao.addEventListener('blur', (evento) => {
      const valorca = evento.target.value.valorFinal;

      if (valorca < 0) {
        window.alert("Data Inválida!");
      }

    });

    console.log("Teste: ", valorFinal);
    document.getElementById('valorlocinput').value = valorFinal;

  });
}


const cpfInput = document.querySelector('#cpf');

cpfInput.addEventListener('blur', (evento) => {
  const valor = evento.target.value;


  if (valor.length < 11) {
    window.alert("CPF inválido!");
  }
});





//-----------------------------------------------------------------------------------------------------------------------------------------\\

document.getElementById('cpf').addEventListener('input', function (event) {
  let inputValue = event.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  inputValue = inputValue.substring(0, 11); // Limita a 11 caracteres (9 dígitos + 2 pontos)

  if (inputValue.length > 9) {
    inputValue = inputValue.replace(/(\d{3})(\d{3})(\d{3})/, '$1.$2.$3-');
  } else if (inputValue.length > 6) {
    inputValue = inputValue.replace(/(\d{3})(\d{3})/, '$1.$2.');
  } else if (inputValue.length > 3) {
    inputValue = inputValue.replace(/(\d{3})/, '$1.');
  }

  event.target.value = inputValue;
});

//-------------------------------------VALIDAÇÕES----------------------------------------------------------------------------------------// 



//-----------------------------------------------------------------------------------------------------------------------------------------

const nomeInput = document.querySelector('#nome_completo');

nomeInput.addEventListener('blur', (evento) => {
  const valorNome = evento.target.value;

  if (valorNome.length < 3) {
    window.alert("Nome inválido!");
  }

  if (/\d/.test(valorNome)) {
    window.alert("Nome inválido, Não Pode Conter Números!");
  }
});


//-----------------------------------------------------------------------------------------------------------------------------------------

function submitData() {
  pegaCategoria(categoriafim)
  calculo()
  console.log("categoria fim dentro da function: ", categoriafim)


  $(document).ready(function () {
    var data = {
      nome_completo: $("#nome_completo").val(),
      data_nascimento: $("#data_nascimento").val(),
      data_retirada: $("#data_retirada").val(),
      data_devolucao: $("#data_devolucao").val(),
      valor_locacao: $("#valorlocinput").val(),
      categoria: $("#categoria-show").val(),
      endereco: $("#endereco").val(),
      telefone: $("#telefone").val(),
      cpf: $("#cpf").val(),
      senha: $("#senha").val(),
      email: $("#email").val(),
      action: $("#action").val(),
    };

    console.log("Email: ", email)

    $.ajax({

      url: 'solicitafunction.php',
      type: 'post',
      data: data,

      success: function (response) {
        alert(response);
        if (response == "Solicitação Successful") {
          console.log("TESTE SOLICITA"),
            Swal.fire({
              icon: 'success',
              title: 'Sucesso!',
              text: 'Solicitação realizado com sucesso!'
            });

          // setTimeout(() => {
          //   window.location.href = "includes/home.php";
          // }, 3000);

        }
        else {

          Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Falha ao Fazer Solicitação'

          });

          console.log("A operação falhou ou retornou outro estado.");
        }
        $('.formularioLocacao input[type="text"]').val('');
        $('.formularioLocacao input[type="date"]').val('');
        $('.formularioLocacao input[type="password"]').val('');

      }


    });
  });
}

document.querySelector('form').addEventListener('submit', function (event) {
  event.preventDefault();
  $('.formularioLocacao input[type="text"]').val('');
  $('.formularioLocacao input[type="date"]').val('');
  $('.formularioLocacao input[type="password"]').val('');


  this.reset();
});

//----------------------------------------------------------------------------------------------------------------------------------// 

