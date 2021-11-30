<?php
include('../controlador.php');
include('header.php');
?>
  <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Sistema gestor de empleados</h3>
                  
                </div>
                
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example" class="display expandable-table dataTable no-footer" style="width: 100%;" role="grid">
                          <thead>
                            <tr role="row">
                                <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="Quote#" style="width: 49px;">ID de empleado</th>
                                <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="Quote#" style="width: 49px;">Nombre</th>
                                <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="Quote#" style="width: 49px;">Correo</th>
                                <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="Quote#" style="width: 49px;">Fecha de ingreso</th>
                                <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="Quote#" style="width: 49px;">Acciones</th> 
                                <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="Quote#" style="width: 49px;">Reporte</th>                                   
                            </tr>
                          </thead>
                      <tbody>
                        
     <?php foreach($empleadoslist as $empleado){?>
                <tr class="odd">
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
                  
                    <button value="Seleccionar" type="submit" class="btn-info" name="accion">Seleccionar</button>
              
                <button value="btn_eliminar" type="submit" class="btn-danger" name="accion">Eliminar</button>
                     </form>

                </td>
                <td>
                    <form action="" method="post">
                    <input type="hidden" name="Id" value=" <?php echo $empleado['Id'];?>">
                    <input type="hidden" name="Nombre" value=" <?php echo $empleado['Nombre'];?>">
                    <input type="hidden" name="Correo" value=" <?php echo $empleado['Correo'];?>">
                    <input type="hidden" name="Fecha_Ingreso" value=" <?php echo $empleado['Fecha_Ingreso'];?>">
                    <button value="btn_pdf" class="btn-success" type="submit" name="accion">Pdf</button>
                    </form>

                </td>
                </tr>
                </tbody>
            <?php } ?>
            </table>
                </div>
            </div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"></div></div></div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
 
    <?php 
    include('footer.php'); 
    ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>

    <?php 
    include('modal.php'); 
    ?>

</body>
</html>