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


//----------------------------------------------------------------------------------------------------------------------------------//


function submitData() {
  $(document).ready(function () {
    var data = {
      cpf: $("#cpf").val(),
      senha: $("#senha").val(),
      action: $("#action").val(),
    };

    $.ajax({

      url: 'function.php',
      type: 'post',
      data: data,


      success: function (response) {
        alert(response);
        if (response == "Login Sucesso Admin") {
          console.log("TESTE LOGIN ADMINISTRADOR"),
            Swal.fire({
              icon: 'success',
              title: 'Sucesso!',
              text: 'Login realizado com sucesso!'
            });

          setTimeout(() => {
            window.location.href = "painel.php";
          }, 3000);

        }

        else if (response == "Login Sucesso User") {
          console.log("TESTE LOGIN USUÁRIO"),
            Swal.fire({
              icon: 'success',
              title: 'Sucesso!',
              text: 'Login realizado com sucesso!'
            });

          setTimeout(() => {
            window.location.href = "Tela-Cliente.php";
          }, 3000);

        }


        else {

          Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Falha ao Fazer Login'

          });

          console.log("A operação falhou ou retornou outro estado.");
        }
      }

    });
  });
}

