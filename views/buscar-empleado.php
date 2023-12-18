<!doctype html>
<html lang="es">
  <head>
    <title>Buscador de vehiculos</title>
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
      <div class="card mt-3">
        <div class="card-header bg-info">
          <span class="text-light">Buscador de Empleado</span>
        </div>
          <div class="card-body">
            <form action = "" id="formBusqueda" autocomplete="off">
              <div class="mb-3 row">
                <div class="input-group mb-3">
                  <input type="text"  maxlength="8" placeholder="Escribe Numero de Documento" class="form-control text-center" id="ndoc">
                  <button class="btn btn-outline-info" type="button" id="Buscar">Buscar Empleado</button>
                </div>
                <small id="status">NO hay busquedas activas</small>
              </div>

              <div class="mb-3">
                <label for="sede" class="form-label">Sede:</label>
                <input type="text" id="sede" class="form-control">
              </div>
              <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" id="apellidos" class="form-control">
              </div>
              <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" id="nombres" class="form-control">
              </div>
              <div class="mb-3">
                <label for="fechanac" class="form-label">Fecha de Nacimiento:</label>
                <input type="text" id="fechanac" class="form-control">
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" id="telefono" class="form-control">
              </div>
            </form>
          </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        function $(id) {return document.querySelector(id)}

        function buscarEmmpleado() {
          const ndoc = $("#ndoc").value

          if (ndoc != "") {
            const parametros = new FormData()
            parametros.append("operacion","search")
            parametros.append("ndoc", ndoc)


            $("#status").innerHTML = "Buscando por favor espere..."

            fetch(`../controllers/Empleado.controller.php`, {
              method: "POST",
              body: parametros
            })
              .then(respuesta => respuesta.json())
              .then(datos => {
                if (!datos) {
                  $("#status").innerHTML = "No se econtro el registro"
                  $("#formBusqueda").reset()
                  $("#ndoc").focus()
                }else{
                  $("#status").innerHTML = "Empleado encontrado"
                  $("#sede").value = datos.sede
                  $("#apellidos").value = datos.apellidos
                  $("#nombres").value = datos.nombres
                  $("#fechanac").value = datos.fechanac
                  $("#telefono").value = datos.telefono
                }
              })
              .catch(e => {
                console.error(e)
              })
          }
        }

        $("#ndoc").addEventListener("keypress", (event) => {
          if (event.keycode == 13) {
            buscarEmmpleado()
          }
        })

        $("#Buscar").addEventListener("click", buscarEmmpleado)

      })
    </script>



   </div>
  </body>
</html>
