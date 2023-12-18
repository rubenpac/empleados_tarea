<?php

require_once '../models/Empleado.php';

if (isset($_POST['operacion'])) {
  
  $empleado = new Empleado();
  
  if ($_POST['operacion'] == 'search') {
    $respuesta = $empleado->search(["ndoc" => $_POST['ndoc']]);
    sleep(2);
    echo json_encode($respuesta);
  }

  if ($_POST['operacion'] == 'add') {
    $datosRecibidos = [
      "idsede"         => $_POST["idsede"],
      "apellidos"      => $_POST["apellidos"],
      "nombres"        => $_POST["nombres"],
      "ndoc"           => $_POST["ndoc"],
      "fechanac"       => $_POST["fechanac"],
      "telefono"       => $_POST["telefono"]
    ];

    $idobtenido = $empleado->add($datosRecibidos);
    echo json_encode($idobtenido);
  }
}