<?php 
require_once 'Conexion.php';

class Sede extends Conexion{

    private $pdo;

    public function __CONSTRUCT(){
        $this->pdo = parent::getConexion();
    }

    public function getAll(){
        try {
          $consulta = $this->pdo->prepare("CALL spu_sede_listar()");
          $consulta->execute();
          return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (Exception $e) {
          die($e->getMessage());
        }  
      }
    public function getResumenSede() {
      try {
        $consulta = $this->pdo->prepare("CALL spu_resumen_sede()");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
}

/* $sede = new Sede();
$resultado = $sede->getAll();
echo json_encode($resultado); */


