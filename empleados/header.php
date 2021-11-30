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
<!-- Plugin css for this page -->
  <link rel="stylesheet" href="../estilos/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../estilos//vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../estilos/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../estilos//css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../estilos/images/favicon.png" />
   </head>
<body>

<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../estilos/images/logo.svg" class="mr-2" alt="logo"></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../estilos/images/logo-mini.svg" alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                
              </div>
              
            </div>
          </li>
        </ul>
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
    
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper ps ps--active-y" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
          <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 625px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 440px;"></div></div></div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Empleados</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#exampleModal">Agregar empleado</a></li>
                 </ul>
         
            </div>
          </li>
     
        </ul>
      </nav>