<?php
/*print_r($_POST);
echo $_POST['Id'];
echo "<br>";
echo $_POST['Nombre'];
echo "<br>";
echo $_POST['Correo'];
echo "<br>";
echo $_POST['Fecha_Ingreso'];
echo "<br>";
*/
$Id=(isset($_POST['Id']))?$_POST['Id']:"";
$Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
$Correo=(isset($_POST['Correo']))?$_POST['Correo']:"";
$Fecha_Ingreso=(isset($_POST['Fecha_Ingreso']))?$_POST['Fecha_Ingreso']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar=$accionCancelar="";
$accionModificar=$accionEliminar=$accionLimpiar="disabled";
$mostrarModal=false;


include ("../conexion/conexion.php");

switch($accion){
    case "btn_agregar":

        $sentencia=$conn->prepare("INSERT INTO empleados (Id,Nombre,Correo,Fecha_Ingreso)
        VALUES (:Id, :Nombre, :Correo, :Fecha_Ingreso)");

        $sentencia->bindParam(':Id',$Id);
        $sentencia->bindParam(':Nombre',$Nombre);
        $sentencia->bindParam(':Correo',$Correo);
        $sentencia->bindParam(':Fecha_Ingreso',$Fecha_Ingreso);
        $sentencia->execute();

       // echo $Id;
        //echo "Agregar";
        
    break;
    case "btn_editar":
        $sentencia=$conn->prepare("UPDATE empleados SET 
        Id=:Id,
        Nombre=:Nombre,
        Correo=:Correo,
        Fecha_Ingreso=:Fecha_Ingreso WHERE 
        Id=:Id");

        $sentencia->bindParam(':Id',$Id);
        $sentencia->bindParam(':Nombre',$Nombre);
        $sentencia->bindParam(':Correo',$Correo);
        $sentencia->bindParam(':Fecha_Ingreso',$Fecha_Ingreso);
        $sentencia->execute();

        header('Location: index.php');
        
    break;
    case "btn_eliminar":
        $sentencia=$conn->prepare("DELETE FROM empleados WHERE Id=:Id"); 
        
        $sentencia->bindParam(':Id',$Id);
        $sentencia->execute();
        header('Location: index.php');

    break;
    case "btn_cancel":
        header('Location: index.php');
    break;
    case "btn_clean":
        $Id="";
        $Nombre="";
        $Correo="";
        $Fecha_Ingreso="";
    break;
   case "Seleccionar":
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar=$accionLimpiar="";
        $mostrarModal=true;
    break;
}

$sentencia= $conn->prepare("SELECT * FROM `empleados` WHERE 1");
$sentencia->execute();
$empleadoslist= $sentencia->fetchAll(PDO::FETCH_ASSOC);

//print_r($empleadoslist);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
     
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/poppers.js/1.12.9/udm/popper.min.js" > </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>
    <title>CRUD Empleados</title>
   </head>
<body>
  <div class="container">
     <form action="" method="post" ectype="multipart/form-data">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Empleados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">
      <label for="">ID de empleado:</label>
      <input type="text"  class="form-control" name="Id" value="<?php echo $Id;?>" placeholder="" id="txt1" require="" disabled>
      <br>
      <br>

      <label for="">Nombre de empleado:</label>
      <input type="text" class="form-control"  name="Nombre" value="<?php echo $Nombre;?>" placeholder="" id="txt2" require=""><br> <br>

      <label for="">Correo electronico:</label>
      <input type="text" class="form-control"  name="Correo" value="<?php echo $Correo;?>"  placeholder="" id="txt3" require=""><br> <br>

      <label for="">Fecha de ingreso:</label>
      <input type="text" class="form-control"  name="Fecha_Ingreso" value="<?php echo $Fecha_Ingreso;?>" placeholder="" id="txt4" require=""><br><br>
      </div>
      </div>
      <div class="modal-footer">
      <button value="btn_agregar"  <?php echo $accionAgregar;?>  class="btn-success" type="submit" name="accion">Agregar</button>
    <button value="btn_editar"  <?php echo $accionModificar;?> class="btn-warning" type="submit" name="accion">Editar</button>
    <button value="btn_eliminar" <?php echo $accionEliminar;?> class="btn-danger"  type="submit" name="accion">Eliminar</button>
    <button value="btn_cancel" <?php echo $accionCancelar;?> class="btn-primary"  type="submit" name="accion">Cancelar</button>
    <button value="btn_clean" <?php echo $accionLimpiar;?> class="btn-light" type="submit" name="accion">Limpiar</button>
         </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Agregar registro +
</button>
</form>

    <div class="row">
        <table class="table">
            <thead>
                <tr class="table-success">
                    <th>ID de empleado</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha de ingreso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php foreach($empleadoslist as $empleado){?>
                <tr>
                    <td> <?php echo $empleado['Id'];?> </td>
                    <td><?php echo $empleado['Nombre'];?> </td>
                    <td><?php echo $empleado['Correo'];?> </td>
                    <td><?php echo $empleado['Fecha_Ingreso'];?> </td>

                <td>
                    <form action="" method="post">
                    <input type="hidden" name="Id" value=" <?php echo $empleado['Id'];?>">
                    <input type="hidden" name="Nombre" value=" <?php echo $empleado['Nombre'];?>">
                    <input type="hidden" name="Correo" value=" <?php echo $empleado['Correo'];?>">
                    <input type="hidden" name="Fecha_Ingreso" value=" <?php echo $empleado['Fecha_Ingreso'];?>">
                    <input type="submit" value="Seleccionar" class="btn-info" name="accion">
                    <button value="btn_eliminar" type="submit" class="btn-danger" name="accion">Eliminar</button>
                    </form>
                   
                
                </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <?php if($mostrarModal) { ?>
        <script>
        $('#exampleModal').modal('show');
        </script>
        
        <?php  }?>

  </div>  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
   
</body>
</html>