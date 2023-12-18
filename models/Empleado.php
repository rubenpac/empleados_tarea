<?php

require_once 'Conexion.php';

class Empleado extends Conexion{

  private $pdo;

  public function __CONSTRUCT(){
    $this->pdo = parent::getConexion();
  }

  /* public function getAll(){
    try {
      $consulta = $this->pdo->prepare("CALL ");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  } */

  public function add($data = []){
    try {
      $consulta = $this->pdo->prepare("CALL spu_empleados_registrar(?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $data['idsede'],
          $data['apellidos'],
          $data['nombres'],
          $data['ndoc'],
          $data['fechanac'],
          $data['telefono']
        )
      );
      return $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function search($data = []){
    try {
      $consulta = $this->pdo->prepare("CALL spu_empleados_buscar(?)");
      $consulta->execute(
        array($data['ndoc'])
      );
      return $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  
}

/* $empleado = new Empleado();
$registro = $empleado->getAll();
echo json_encode($registro); */

