document.getElementById('cpf').addEventListener('input', function (event) {
      let inputValue = event.target.value.replace(/\D/g, '');
      inputValue = inputValue.substring(0, 11);

      if (inputValue.length > 9) {
        inputValue = inputValue.replace(/(\d{3})(\d{3})(\d{3})/, '$1.$2.$3-');
      } else if (inputValue.length > 6) {
        inputValue = inputValue.replace(/(\d{3})(\d{3})/, '$1.$2.');
      } else if (inputValue.length > 3) {
        inputValue = inputValue.replace(/(\d{3})/, '$1.');
      }

      event.target.value = inputValue;
    });

document.getElementById('phone').addEventListener('input', function (event) {
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