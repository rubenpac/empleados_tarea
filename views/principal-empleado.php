
<?php
  include_once '../models/Conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->getConexion();

  $consulta = "SELECT * FROM empleados;";
  $resultado = $conexion->prepare($consulta);
  $resultado->execute();
  $empleados = $resultado->fetchAll(PDO::FETCH_ASSOC)
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Principal de empleados</title>
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
      <div class="card mt-5">
        <div class="card-header bg-info text-center" >
        <h4 class="text-light " >Lista de empleados</h4>
        </div>
        
        

        <div class=" text-center d-grid gap-2 d-md-block mt-3">
          <a href="registar-empleado.php">
            <button class="btn btn-outline-warning " type="button" id="">Registrar Empleado</button>
          </a> 
          <a href="buscar-empleado.php">
            <button class="btn btn-outline-info" type="button" id="">Buscar Empleado</button>
          </a>
          <a href="estadisticas.php">
            <button class="btn btn-outline-danger" type="button" id="">Ver estadisticas</button>
          </a>
        </div>
        
        

        <div class="container">
          <div class="card mt-3 text-center">
            <table id="tablaEmpleados" class="table mt-3 border-danger " id="example">
              <thead>
                <tr>
                  <!-- <th scope="col">ID</th> -->
                  <th scope="col">IDsede</th>
                  <!-- <th scope="col">Sede</th> -->
                  <th scope="col">Apellidos</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Nº Documento</th>
                  <th scope="col">Fecha Nac.</th>
                  <th scope="col">Telefono</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($empleados as $empleado){
                ?>
                <tr>
                  <td hidden ><?php echo $empleado['idempleado'] ?></td>
                  <td ><?php echo $empleado['idsede'] ?></td>
                  
                  <td><?php echo $empleado['apellidos'] ?></td>
                  <td><?php echo $empleado['nombres'] ?></td>
                  <td><?php echo $empleado['ndoc'] ?></td>
                  <td><?php echo $empleado['fechanac'] ?></td>
                  <td><?php echo $empleado['telefono'] ?></td>
                </tr>
                  <?php 
                  }
                  ?>
              </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

    <script>
      (function(){
        $('#tablaEmpleados').DataTable();
      });
    </script>

  </body>
</html>
