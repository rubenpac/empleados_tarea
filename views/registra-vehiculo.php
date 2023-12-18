<!doctype html>
<html lang="es">
  <head>
    <title>Registro de vehiculos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>

  <div class="container">
        <div class="alert alert-info mt-3">
          <h5>Registro de vehiculos</h5>
          <samp>Complete la informacion solicitada</samp>
        </div>

          <div class="card-body">
            <form action="" id="formVehiculo" autocomplete="off">

                <div class="mb-3">
                  <label for="marca" class="form-label">Marca:</label>
                  <select name="marca" id="marca" class="form-select" required>
                    <option value="">Seleccione</option>
                  </select>
                </div>
              <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" id="modelo" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">color:</label>
                <input type="text" id="color" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="tipocombustible" class="form-label">Tipo combustible:</label>
                <select name="tipocombustible" id="tipocombustible" class="form-select" required>
                  <option value="">Seleccione</option>
                  <option value="GSL">Gasolina</option>
                  <option value="DSL">Diesel</option>
                  <option value="GNV">GNV</option>
                  <option value="GLP">GLP</option>
                </select>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="peso" class="form-label">Peso:</label>
                  <input type="number" min="0" id="peso" class="form-control text-end" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="fabricacion" class="form-label">Año de Fabricacion:</label>
                  <input type="number" id="afabricacion" class="form-control text-end" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="placa" class="form-label">Placa:</label>
                  <input type="text"  id="placa" maxlength="7" minlength="7" class="form-control text-center" required>
                </div>
              </div>

              <div class="mb-3 text-end">
                <button class="btn btn-primary" id="guardar" type ="submit">Guardar datos</button>
                <button class="btn btn-secondary" id="reset">Cancelar</button>
              </div>

            </form>

          </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {

        function $(id) {return document.querySelector(id)}

        //Funcion
        //
        (function (){
          fetch(`../controllers/Marca.controller.php?operacion=listar`)
            .then(respuesta => respuesta.json())
            .then(datos => {
              datos.forEach(element => {
                const tagOption = document.createElement("option")
                tagOption.value = element.idmarca
                tagOption.innerHTML = element.marca
                $("#marca").appendChild(tagOption)
              });
            })
            .catch(e => {
              console.error(e)
            })
        })();

        $("#formVehiculo").addEventListener("submit", (event)=>{
          //evitamos el envio por ACTIOn
          event.preventDefault();

          //Enviare por AJAX fecth
          if (confirm("¿Desea registar este vehiculo?")) {

            const parametros = new FormData()
            parametros.append("operacion", "add")  //Importante
            // a partir de este punto las variables que requiere el SPU
            parametros.append("idmarca", $("#marca").value)
            parametros.append("modelo", $("#modelo").value)
            parametros.append("color", $("#color").value)
            parametros.append("tipocombustible", $("#tipocombustible").value)
            parametros.append("peso", $("#peso").value)
            parametros.append("afabricacion", $("#afabricacion").value)
            parametros.append("placa", $("#placa").value)

            fetch(`../controllers/Vehiculo.controller.php`, {
              method: "POST",
              body: parametros
            })
              .then(respuesta => respuesta.json())
              .then(datos => {
                if (datos.idvehiculo > 0) {
                  $("#formVehiculo").reset()
                  alert(`Vehiculo registrado con ID: ${datos.idvehiculo}`)
                }
              })
              .catch(e => {
                console.error(e)
              })
          }
        })
        
      })
    </script>



   </div>
  </body>
</html>
