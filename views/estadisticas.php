<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <div style="width: 70%; margin:auto;">
  <canvas id="lienzo">my Grafico</canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const contexto = document.querySelector("#lienzo")
    const garfico = new Chart( contexto, {
      type: 'bar',
      data: {
        labels: ["A","B","C"],
        datasets: [{
          label: "Sede",
          data: []
        }]
      }
    });

    (function (){
        fetch(`../controllers/Sede.controller.php?operacion=getResumenSede`)
            .then(respuesta => respuesta.json())
            .then(datos => {
              console.log(datos)
                garfico.data.labels = datos.map(registro => registro.sede)
                garfico.data.datasets[0].data = datos = datos.map(registro => registro.total)
            })
            .catch(e => {
          console.error(e)
        })
    })();

  </script>


</body>
</html>