<?php
//print_r(PDO::getAvailableDrivers()); muetra con que api de DB disponible podemos trabajar
// pdo(intantamcia la clase pdo statement), pdo statement(maneja las sentencias y devuelve los resultados), pdo exception(manejo de errores) la classe pdo se encarga para la concexion
/*$animal = new Animal();
$animal->id = 3;
$animal->name = "kasper";
$animal->age = 3;
$animal->breed = "pitbull";
$animal->color = "gris";
$animal->specie = "perro";
$animal->gender = "macho";

//$animal->create();
//$animal->delete(2);
$animal-> update();

print_r ($animal-> getAll());
*/
//control frontal lo que queremos mostrar
if (!isset($_REQUEST['controller'])) {
    require_once 'controller/animal_controller.php'; // si no se recibe un control que cargar
    $controller = new AnimalController();
    $controller->indexAnimal(); //se muestra la vista de animal
} else {
  //si recibimos con control a cargar hacemos una instancia
  $controller = $_REQUEST['controller'];
  $action = $_REQUEST['action']; // es el que se va a ejecutar;
  require_once 'controller/'.$controller.'_controller.php'; //inporta el archivo es muy importante usar la nomenclatura al final de _controller
  $controller = ucwords($controller).'Controller'; // este medodo devuelve el primer nombre de la clase con la primera letra en mayuscula
  $controller = new $controller;
  call_user_func(array($controller, $action)); //primer parametro instancia, segundo el metodo o acction a ejecutar
  //call_user_func(array($controller, $action),$parametros que queremos enviar a action);
}

 ?>
