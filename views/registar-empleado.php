<!doctype html>
<html lang="es">
  <head>
    <title>Registro de Empleados</title>
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
        <div class="alert alert-warning mt-5">
          <h5>Registro de Empleado</h5>
          <samp>Complete la informacion solicitada</samp>
        </div>

          <div class="card-body">
            <form action="" id="formEmpleado" autocomplete="off">

                <div class="mb-3">
                  <label for="sede" class="form-label">Sede:</label>
                  <select name="sede" id="sede" class="form-select" required>
                    <option value="">Seleccione</option>
                  </select>
                </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" id="apellidos" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" id="nombres" class="form-control" required>
              </div>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="ndoc" class="form-label">ndocumento:</label>
                  <input maxlength="8" minlength="8" type="text" id="ndoc" class="form-control text-end" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="fechanac" class="form-label">Fecha Nacimiento:</label>
                  <input type="text" id="fechanac" class="form-control text-end" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="telefono" class="form-label">Telefono:</label>
                  <input type="text"  id="telefono" maxlength="9" minlength="9" class="form-control text-center" required>
                </div>
              </div>
              <div class="mb-3 text-end">
                <button class="btn btn-warning" id="guardar" type ="submit">Guardar datos</button>
                <button class="btn btn-secondary" id="reset">Cancelar</button>
              </div>

            </form>

          </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {

        function $(id) {return document.querySelector(id)}

        (function () {
          fetch(`../controllers/Sede.controller.php?operacion=listar`)
            .then(respuesta => respuesta.json())
            .then(datos => {
              datos.forEach(element => {
                const tagOption = document.createElement("option")
                tagOption.value = element.idsede
                tagOption.innerHTML = element.sede
                $("#sede").appendChild(tagOption)
              });
            })
            .catch(e => {
              console.error(e)
            })
        })();

        $("#formEmpleado").addEventListener("submit", (event)=>{
          event.preventDefault();

          if (confirm("¿Decea registrar este empleaado")) {
            const parametros = new FormData()
            parametros.append("operacion", "add")
            parametros.append("idsede",$("#sede").value)
            parametros.append("apellidos",$("#apellidos").value)
            parametros.append("nombres",$("#nombres").value)
            parametros.append("ndoc",$("#ndoc").value)
            parametros.append("fechanac",$("#fechanac").value)
            parametros.append("telefono",$("#telefono").value)

            fetch(`../controllers/Empleado.controller.php`, {
              method: "POST",
              body: parametros
            })
            .then(respuesta => respuesta.json())
            .then(datos => {
              if (datos.idsede > 0) {
                $("#formEmpleado").reset()
                alert(`Empleado registrado con ID: ${datos.idsede}`)
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
