<!--el value se obtiene de la base de datos y de la clase animal por lo tanto los nombres tienen que coincidir para evitar errores en el form-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.php?controller=animal&action=save" method="post">
      <table>
        <input type="hidden" name="id" value="<?php echo $animal->id; ?>"/>
        <tr>
          <td>Nombre</td>
          <td>
            <input type="text" name="name" value="<?php echo $animal->name; ?>"/>
          </td>
        </tr>
        <tr>
          <td>Especie</td>
          <td>
            <input type="text" name="specie" value="<?php echo $animal->specie; ?>"/>
          </td>
        </tr>
        <tr>
          <td>Raza</td>
          <td>
            <input type="text" name="breed" value="<?php echo $animal->breed; ?>"/>
          </td>
        </tr>
        <tr>
          <td>Genero</td>
          <td>
            <select class="" name="gender"> <!--select hace un menu validacion con operador ternario-->
              <option <?php echo $animal->gender=='Macho'?'Selected':''; ?>value="Macho">Macho</option>
              <option <?php echo $animal->gender=='Hembre'?'Selected':''; ?>value="Hembra">Hembra</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Color</td>
          <td>
            <input type="text" name="color" value="<?php echo $animal->color ?>"/>
          </td>
        </tr>
        <tr>
          <td>Edad</td>
          <td>
            <input type="text" name="age" value="<?php echo $animal->age; ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="guardar" value="enviar"/>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
