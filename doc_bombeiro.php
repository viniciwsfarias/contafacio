<?php
require "adm/conecta.php"; // Conexão com o banco de dados
//require "../adm/include/erro.php"; // Conexão com o banco de dados
ob_start();
session_start();
$nome = $_SESSION['username'];
$bombeiro_id = $_GET['bombeiro_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contafacio Contabilidade</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        .capa{
            width: 100%;
            height: 30px;
            background-color: #6495ED;
            font-size: 15pt;
            color: #fff;
        }
        #btnVoltar{
            margin-right: 60px;
            margin-top: 10px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
            <img src="img/logo_home.png" class="rounded mx-auto d-block">
        </a>

        <!-- Divider -->
        <!--<hr class="sidebar-divider my-0">-->

        <!-- Nav Item - Dashboard -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
            <div class="sidebar-brand-icon rotate-n-15">                    
            </div>
            <div class="sidebar-brand-text mx-3">Contafacio Contabilidade</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Departamentos
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Setor Pessoal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Setor Contábil</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Setor Fisco-Contábil</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Setor Fiscal</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-fw fa-chart-area"></i>
                                <span>Diretotia</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="legalizacao.php">
                                    <i class="fas fa-fw fa-chart-area"></i>
                                    <span>Legalização</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-fw fa-chart-area"></i>
                                        <span>T.I</span></a>
                                    </li>

                                    <!-- Nav Item - Utilities Collapse Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                                        aria-expanded="true" aria-controls="collapseUtilities">
                                        <i class="fas fa-fw fa-wrench"></i>
                                        <span>Outros</span>
                                    </a>
                                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                                    data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">Setores:</h6>
                                        <a class="collapse-item" href="utilities-color.html">Arquivo</a>
                                        <a class="collapse-item" href="utilities-border.html">Auditoria</a>
                                        <a class="collapse-item" href="utilities-animation.html">Financeiro</a>
                                        <a class="collapse-item" href="utilities-other.html">Juridico</a>
                                    </div>
                                </div>
                            </li>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <!-- Heading -->
                            <div class="sidebar-heading">
                                Ferramentas
                            </div>

                            <!-- Nav Item - Pages Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                                aria-expanded="true" aria-controls="collapsePages">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Chamados</span>
                            </a>
                <!--<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>-->
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tables</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                    <!-- Sidebar Message -->
            <!--<div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>-->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <span class="badge badge-danger badge-counter">7</span>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
    aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
        Message Center
    </h6>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="img/undraw_profile_1.svg"
            alt="...">
            <div class="status-indicator bg-success"></div>
        </div>
        <div class="font-weight-bold">
            <div class="text-truncate">Hi there! I am wondering if you can help me with a
            problem I've been having.</div>
            <div class="small text-gray-500">Emily Fowler · 58m</div>
        </div>
    </a>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="img/undraw_profile_2.svg"
            alt="...">
            <div class="status-indicator"></div>
        </div>
        <div>
            <div class="text-truncate">I have the photos that you ordered last month, how
            would you like them sent to you?</div>
            <div class="small text-gray-500">Jae Chun · 1d</div>
        </div>
    </a>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="img/undraw_profile_3.svg"
            alt="...">
            <div class="status-indicator bg-warning"></div>
        </div>
        <div>
            <div class="text-truncate">Last month's report looks great, I am very happy with
            the progress so far, keep up the good work!</div>
            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
        </div>
    </a>
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
            alt="...">
            <div class="status-indicator bg-success"></div>
        </div>
        <div>
            <div class="text-truncate">Am I a good boy? The reason I ask is because someone
            told me that people say this to all dogs, even if they aren't good...</div>
            <div class="small text-gray-500">Chicken the Dog · 2w</div>
        </div>
    </a>
    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
</div>
</li>

<div class="topbar-divider d-none d-sm-block"></div>

<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
    <img class="img-profile rounded-circle"
    src="img/undraw_profile.svg">
</a>
<!-- Dropdown - User Information -->
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
aria-labelledby="userDropdown">
<a class="dropdown-item" href="#">
    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
    Profile
</a>
<a class="dropdown-item" href="#">
    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
    Settings
</a>
<a class="dropdown-item" href="#">
    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
    Activity Log
</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
</a>
</div>
</li>

</ul>

</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departamento de Legalização</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#uploadModal"><i
            class="fas fa-upload fa-sm text-white-50"></i> Upload</a>
        </div>

        <!-- Content Row -->
        <div class="row">
           <!-- INICIO MODAL DOC -->
           <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
           <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="cadAnexo.php?bombeiro_id=<?php echo $bombeiro_id;?>&tipo=2" enctype="multipart/form-data">
                        <label>Nome:</label>
                        <input type="text" name="nome" placeholder="nome do arquivo"><br>
                        <label>Arquivo:</label>
                        <input type="file" name="arquivo"><br>
                        <label>Categoria</label>
                        <select name="categoria">
                            <option value="1">Alvara e Certificados</option>
                            <option value="2">CEI</option>
                            <option value="3">Certidões</option>
                            <option value="4">CNPJ e FIC</option>
                            <option value="5">Contrato e Alterações</option>
                            <option value="6">Documento dos Sócios</option>
                            <option value="7">Outros Documentos</option>
                            <option value="8">Termo de Acordo</option>
                        </select><br>
                        <input type="submit" name="enviar" value="Cadastrar">
                    </form>

                </div>
                <div class="modal-footer">
                   <a class="btn btn-primary" href="doc_alvara.php?alvara_id=<?php echo $id; ?>" role="button">Domumentos</a>
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Sair</button>
               </div>
           </div>
       </div>
   </div>
   
   <!-- FIM MODAL DOC -->

   <div class="card text-center">
    <div class="capa">Bombeiros</div>
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="#home" aria-selected="true" >Alváras e Certificados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cei-tab" data-toggle="tab" href="#cei" role="tab" aria-controls="cei" aria-selected="false">CEI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="certidoes-tab" data-toggle="tab" href="#certidoes" role="tab" aria-controls="certidoes" aria-selected="false">Certidões</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cnpj-tab" data-toggle="tab" href="#cnpj" role="tab" aria-controls="cnpj" aria-selected="false">CNPJ e FIC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contrato-tab" data-toggle="tab" href="#contrato" role="tab" aria-controls="contrato" aria-selected="false">Contrato e alterações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="doc_socio-tab" data-toggle="tab" href="#doc_socio" role="tab" aria-controls="doc_socio" aria-selected="false">Doc dos Sócios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="outros-tab" data-toggle="tab" href="#outros" role="tab" aria-controls="outros" aria-selected="false">Outros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="acordo-tab" data-toggle="tab" href="#acordo" role="tab" aria-controls="cacordo" aria-selected="false">Termo de Acordo</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 1 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Dowaload</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>
                </div>    
                <div class="tab-pane fade" id="cei" role="tabplanel" aria-labelledby="cei-tab">
                   <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 2 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Download</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>   
                </div>
                <div class="tab-pane fade" id="certidoes" role="tabplanel" aria-labelledby="certidoes-tab">
                   <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 3 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Download</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>   
                </div>
                <div class="tab-pane fade" id="cnpj" role="tabplanel" aria-labelledby="cnpj-tab">
                   <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 4 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Download</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>   
                </div>
                <div class="tab-pane fade" id="contrato" role="tabplanel" aria-labelledby="contrato-tab">
                   <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 5 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Download</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>   
                </div>
                <div class="tab-pane fade" id="doc_socio" role="tabplanel" aria-labelledby="doc_socio-tab">
                   <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 6 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Download</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>   
                </div>
                <div class="tab-pane fade" id="outros" role="tabplanel" aria-labelledby="outros-tab">
                   <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 7 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Download</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>   
                </div>
                <div class="tab-pane fade" id="acordo" role="tabplanel" aria-labelledby="acordo-tab">
                   <table class="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Documentos</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql = "SELECT arquivo FROM anexo_bombeiro WHERE categoria = 8 and bombeiro_id = '".$bombeiro_id."' ";
                    $result = mysqli_query($con, $sql);
                    echo mysqli_error($con);
                    if(mysqli_num_rows($result)==0){
                    }else{
                        while(list($arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td><a href="upload\<?php echo $arquivo; ?>" download>Download</a></td>
                                </tr>
                            </tbody>
                        <?php }} ?>
                    </table>   
                </div>
            </div>
        </div>
    </div>
    


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<button type="button" class="btn btn-outline-primary float-right" id="btnVoltar" onClick="history.go(-1)">Voltar</button>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span> Desenvolvido por Contafacio Contabilidade &copy;</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>