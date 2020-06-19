<?php
require_once 'connection.php';
abstract class Crud extends Connection
{
  private $table;
  private $pdo;//pdo viene a ser la api
//metodo de conexion
  public function __construct($table)
  {
    $this->table = $table;
    $this->pdo = parent::conexion();
  }
//metodos de consulta
  public function getAll()
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM $this->table");
      $stm-> execute();
      return $stm-> fetchAll(PDO::FETCH_OBJ); //fetchAll obtine todos los registross
    } catch (PDOException $e) {
      echo $e-> getMessage();
    }
  }

  public function getById($id)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=?");
      $stm-> execute(array($id));
      return $stm->fetch(PDO::FETCH_OBJ); //solo obtiene un objeto
    } catch (PDOException $e) {
      echo $e-> getMessage();
    }
  }

  public function delete($id)
  {
    try {
      $stm = $this-> pdo-> prepare("DELETE FROM $this->table WHERE id=?");
      $stm-> execute(array($id));
    } catch (PDOException $e) {
      echo $e-> getMessage();
    }
  }

  abstract function create(); //metodos forzosamente obligatorios tienen que ser inplementados en los models
  abstract function update();
}
?>
