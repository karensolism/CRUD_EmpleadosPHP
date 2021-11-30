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
      <input type="text"  class="form-control" name="Id" value="<?php echo $Id;?>" placeholder=""  require="" disabled>
      <br>
      <br>

      <label for="">Nombre de empleado:</label>
      <input type="text" class="form-control"  name="Nombre" value="<?php echo $Nombre;?>" placeholder=""  require=""><br> <br>

      <label for="">Correo electronico:</label>
      <input type="text" class="form-control"  name="Correo" value="<?php echo $Correo;?>"  placeholder=""  require=""><br> <br>

      <label for="">Fecha de ingreso:</label>
      <input type="text" class="form-control"  name="Fecha_Ingreso" value="<?php echo $Fecha_Ingreso;?>" placeholder=""  require=""><br><br>
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


  </div>  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
   

    <?php if($mostrarModal) { ?>
        <script>
        $('#exampleModal').modal('show');
        </script>     
        <?php }?>