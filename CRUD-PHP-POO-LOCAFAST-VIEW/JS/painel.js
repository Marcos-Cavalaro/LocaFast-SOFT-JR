let instanceRenda = null;
let instanceCategoria = null;

// --- GRÁFICO DE RENDA ---
const chartRenda = document.getElementById('myChartRenda');

fetch('script.php')
  .then((response) => response.json())
  .then((data) => { 
    createChart(data, 'bar'); 
  })
  .catch((error) => console.error("Erro ao buscar dados:", error));

function createChart(chartData, type) {
  if (!chartData || chartData.length === 0) {
    console.warn("Nenhum dado recebido para o gráfico de Barra.");
    return;
  }

  if (instanceRenda) {
    instanceRenda.destroy();
  }

  instanceRenda = new Chart(chartRenda, {
    type: type,
    data: {
      labels: chartData.map(row => row.data_devolucao),
      datasets: [{
        label: 'Renda',
        data: chartData.map(row => row.valor_locacao),
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
}

// --- GRÁFICO DE CATEGORIA ---
const chartCategoria = document.getElementById('myChartCategoria'); 

fetch('script-categoria.php')
  .then((response) => response.json())
  .then((dataCategoria) => {
    createChartCategoria(dataCategoria, 'pie');
  })
  .catch((error) => console.error("Erro ao buscar dados:", error));

function createChartCategoria(chartDataCategoria, type) {
  if (!chartDataCategoria || chartDataCategoria.length === 0) {
    console.warn("Nenhum dado recebido para o gráfico de pizza.");
    return;
  }

  if (instanceCategoria) {
    instanceCategoria.destroy();
  }

  instanceCategoria = new Chart(chartCategoria, {
    type: type,
    data: {
      labels: chartDataCategoria.map(row => row.categoria),
      datasets: [{
        label: 'Categorias',
        data: chartDataCategoria.map(row => row.total),
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true
    }
  });
}
