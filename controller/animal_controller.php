<?php
require_once 'model/animal.php';
class AnimalController
{
  private $model;

  public function __construct()
  {
    $this->model = new Animal();
  }

  public function indexAnimal()
  {
    require_once 'view/animal.php';
  }

  public function showById()
  {
    $animal = new Animal();
    if (isset($_REQUEST['id'])) {
      $animal = $this->model->getById($_REQUEST['id']);
    }
    require_once 'view/animal_form.php';
  }

  public function save()
  {
    $animal = new Animal();
    $animal->id = $_REQUEST['id'];
    $animal->name = $_REQUEST['name'];
    $animal->specie = $_REQUEST['specie']; //estos parametros que recibe request son los nombres de las etiquetas html.
    $animal->breed = $_REQUEST['breed'];
    $animal->gender = $_REQUEST['gender'];
    $animal->color = $_REQUEST['color'];
    $animal->age = $_REQUEST['age'];

    $animal->id>0?$animal->update():$animal->create(); // validacion para crear o actualizar.
    header('location: index.php');
  }

  public function quit()
  {
    $this->model->delete($_REQUEST['id']); //eliminar
    header('location: index.php'); //los header se utilizaron para comunicarnos entre las vistas.
  }
}
 ?>
