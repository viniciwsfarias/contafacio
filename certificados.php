<?php
require "adm/conecta.php";
ob_start();
session_start();

function day($data){
   return date("d/m/Y", strtotime($data));
}

function expirar($days){
    $dataFinal = $days;
     //echo $dataFinal; echo " - ";
    $dataHoje = date('Y-m-d');
    //echo $dataHoje; echo " - ";


    $diferenca = strtotime($dataFinal) - strtotime($dataHoje);
    $dias = floor($diferenca / (60 * 60 * 24));
    return $dias;

}
 if(isset($_POST['pesquisar'])){
$pesquisar = "%".$_POST['pesquisar']."%";
//$tipo = $_POST['tipo'];
}else{
    $pesquisar = "";
    $tipo = "certificados";
}
function update($situacao, $id){
    require "adm/conecta.php";
    $sit = $situacao;
    $cod = $id;

    if($situacao > 0 && $situacao < 10){
       $sql = "UPDATE `certificados` SET `situacao` = '1' WHERE id = '".$cod."' ";
       $result = mysqli_query($con, $sql);
        echo mysqli_error($con); 
    }else
    if($situacao <= 0){
        $sql = "UPDATE `certificados` SET `situacao` = '2' WHERE id = '".$cod."' ";
       $result = mysqli_query($con, $sql);
        echo mysqli_error($con);
    }else
    if($situacao > 10){
        $sql = "UPDATE `certificados` SET `situacao` = '0' WHERE id = '".$cod."' ";
       $result = mysqli_query($con, $sql);
        echo mysqli_error($con);
    
     }
    
                                             
                                         

}
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
        .faixa ul li{
            display: inline-block;

        }
        .faixa button{
           margin: 0px;
        }
        table, tbody, tr, th, td{
            font-size: 8pt;
        }
        #btnNovo{
            margin: 10px;
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
                    <span>Setor Cont??bil</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Setor Fisco-Cont??bil</span></a>
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
                                    <span>Legaliza????o</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ti.php">
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
            <div class="small text-gray-500">Emily Fowler ?? 58m</div>
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
            <div class="small text-gray-500">Jae Chun ?? 1d</div>
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
            <div class="small text-gray-500">Morgan Alvarez ?? 2d</div>
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
            <div class="small text-gray-500">Chicken the Dog ?? 2w</div>
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
        <h1 class="h3 mb-0 text-gray-800">Departamento de Legaliza????o</h1>
    </div>
    <div class="alert alert-success align-items-center" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            ?>
    </div>
        <!-- Content Row -->
    <div class="row">
         <!-- CARD -->
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="#home" aria-selected="true" >Certificados Digitais</a>
                    </li>
                </ul>
            </div> 
            <div class="card-body"> 
                <div class="tab-content" id="myTabContent">
                    <!-- inicio card alvara -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-left" method="POST" action="certificados.php">
                            <div class="input-group">
                                <div class="input-group">
                                    
                                    <input type="text" name="pesquisar" id="pesquisar" class="form-control bg-light border-0 small" placeholder="Pesquisar por..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="Submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
                                        <script type="text/javascript" src="js/personalizado.js"></script>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn btn-primary  float-right" id="btnNovo" data-toggle="modal" data-target="#cadAlvaraModal">Novo</button>
                        <table class="table table-bordered table-responsive" width="100%">
                            <thead class="table-dark">
                                <tr>

                                    <th scope="col" width="400">Empresas</th>
                                    <th scope="col" width="200">CNPJ</th>
                                    <th scope="col" width="" >Situa????o</th>
                                    <th scope="col" width="500">Op????es</th>
                                </tr>
                            </thead>
                            <?php
                            $cert = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
                            $sql = "SELECT id, certificados, cnpj, email, CAST(vencimento as date), senha, situacao, telefone, responsavel, observacao, status, arquivo  FROM certificados WHERE certificados LIKE '%$cert%' ORDER BY certificados ASC";
                            $result = mysqli_query($con, $sql);
                            echo mysqli_error($con);

                            if(mysqli_num_rows($result)==0){

                            }else{
                              while(list($id, $certificados, $cnpj, $email, $vencimento, $senha, $situacao, $telefone, $responsavel, $observacao, $status, $arquivo ) = mysqli_fetch_array($result)){ 

                                ?>


                                <tbody>
                                    <tr>

                                        <td class="resultado"><?php echo $certificados; ?></td>
                                        <td><?php echo $cnpj; ?></td>
                                        <td>
                                            <?php 
                                            $days = $vencimento;  
                                            $situacao = expirar($days);
                                            if($situacao == 1){
                                                $msg = "<font color='orange'>Ultimo dia!</font>";
                                            }else
                                            if($situacao > 0 && $situacao < 10){
                                             $msg = "<font color='gold'>".$situacao." dias para vencer.</font>";
                                             update($situacao, $id);
                                         }else
                                         if($situacao <= 0){
                                             $msg = " <font color='red'>Certificado vencido!</font>";
                                             update($situacao, $id);
                                         }else
                                         if($situacao > 10){
                                             $msg = "<font color='green'>".$situacao." dias para vencer.</font>";
                                            update($situacao, $id); 
                                         }
                                         echo $msg; 

                                         ?>                                                         
                                     </td>
                                     <td>
                                        <div class="faixa">
                                            <ul>
                                                <li>
                                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalheModal<?php echo $id; ?>">Detalhe</button>
                                                </li>
                                                <li>
                                                   <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $certificados; ?>"
                                                       data-whateverid="<?php echo $id; ?>" 
                                                       data-whatevercnpj="<?php echo $cnpj; ?>" 
                                                       data-whatevervencimento="<?php echo $vencimento; ?>"
                                                       data-whateversenha="<?php echo $senha; ?>" 
                                                       data-whateveremail="<?php echo $email; ?>"
                                                       data-whatevertelefone="<?php echo $telefone; ?>"
                                                       data-whateverresponsavel="<?php echo $responsavel; ?>"
                                                       data-whateverobservacao="<?php echo $observacao;?>
                                                       " data-whateverstatus="<?php echo $status; ?>"
                                                       >Editar</button>
                                                </li>
                                                <li>
                                                    <form class="form-horizontal" method="POST" action="cadastrar_certificados.php?id=<?php echo $id; ?> ">
                                                        <button type="submit" name="Submit" value="Excluir" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <a type="button" class="btn btn-info btn-sm" href="upload\certificados\<?php echo $arquivo; ?>" download>Download</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal detalhe -->
                                <div class="modal fade" id="detalheModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $certificados; ?></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">??</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                              ID: <?php echo $id; ?>
                                              <br>
                                              Empresa: <?php echo $certificados; ?>
                                              <br>
                                              Vencimento: <?php echo $vencimento; ?>
                                              <br>
                                              Senha: <?php echo $senha; ?>
                                              <br>
                                              Situacao: <?php echo $situacao.' dias para vencer'; ?> 
                                              <br>
                                              Status: <?php echo $status; ?>
                                              <br>
                                              CNPJ: <?php echo $cnpj; ?>
                                              <br>
                                              Responsavel: <?php echo $responsavel; ?>
                                              <br>
                                              telefone: <?php echo $telefone; ?>
                                              <br>
                                              Email: <?php echo $email; ?>
                                              <br>
                                              Observa??oes: <?php echo $observacao; ?>
                                              <br>
                                              Status: <?php echo $status; ?>
                                              <br>
                                              


                                          </div>
                                          <div class="modal-footer">
                                            <a class="btn btn-primary" href="send_mail.php?id=<?php echo $id; ?>">Enviar Alerta</a>
                                             <button class="btn btn-secondary" type="button" data-dismiss="modal">Sair</button>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                             <?php
                                }
                              }
                             ?>
                            </tbody>
                        </table>
                    </div> <!-- fim do card alvara -->
                </div><!-- myTabContent -->
            </div><!-- fim card-body -->
        </div><!-- fim do card -->
    </div><!--row -->
</div><!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Desenvolvido por Contafacio Contabilidade</span>
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
<!------------------------------------------------------- MODAL -------------------------------------------------------->

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title align-items-center" id="exampleModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
                <form  class="form-horizontal" method="POST" action="cadastrar_certificados.php">
                    <div class="form-group">
                        <label for="recipientid" class="control-label">ID:</label>
                        <input type="text" name="id" class="form-control" id="recipientid">
                    </div>
                    <div class="form-group">
                        <label for="recipient-certificados" class="control-label">Certificados:</label>
                        <input type="text" name="certificados" class="form-control" id="recipient-certificados">
                    </div>
                    <div class="form-group">
                        <label for="recipient-vencimento" class="control-label">Vencimento:</label>
                        <input type="text" name="vencimento" class="form-control" id="recipient-vencimento" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-senha" class="control-label">Senha:</label>
                        <input type="text" name="senha" class="form-control" id="recipient-senha" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-cnpj" class="control-label">CNPJ:</label>
                        <input type="text" name="cnpj" class="form-control" id="recipient-cnpj">
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="control-label">Email:</label>
                        <input type="text" name="email" class="form-control" id="recipient-email">
                    </div>
                    <div class="form-group">
                        <label for="recipient-telefone" class="control-label">Telefone:</label>
                        <input type="text" name="telefone" class="form-control" id="recipient-telefone">
                    </div>
                    <div class="form-group">
                        <label for="recipient-responsavel" class="control-label">Respons??vel:</label>
                        <input type="text" name="responsavel" class="form-control" id="recipient-responsavel">
                    </div>
                    <div class="form-group">
                        <label for="recipient-observacao" class="control-label">Observa??oes:</label>
                        <input type="text" name="observacao" class="form-control" id="recipient-observacao">
                    </div>
                     <div class="form-group">
                        <label for="recipient-status" class="control-label">Status:</label>
                        <input type="text" name="status" class="form-control" id="recipient-status">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="Submit" value="Salvar" class="btn btn-primary btn-sm">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit alvara -->

<!-- Cad certificado Modal -->
<div class="modal fade" id="cadAlvaraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
    </div>
    <div class="modal-body">
        <form  class="form-horizontal" method="POST" action="cadastrar_certificados.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="recipient-certificados" class="control-label">Empresa:</label>
                <input type="text" name="certificados" class="form-control" id="recipient-certificados">
            </div>
            <div class="form-group">
                <label for="recipient-vencimento" class="control-label">Vencimento:</label>
                <input type="Date" name="vencimento" class="form-control" id="recipient-vencimento">
            </div>
            <div class="form-group">
                <label for="recipient-senha" class="control-label">Senha:</label>
                <input type="text" name="senha" class="form-control" id="recipient-senha">
            </div>
            <div class="form-group">
                <label for="recipient-cnpj" class="control-label">CNPJ:</label>
                <input type="text" name="cnpj" class="form-control" id="recipient-cnpj">
            </div>
            <div class="form-group">
                <label for="recipient-email" class="control-label">Email:</label>
                <input type="text" name="email" class="form-control" id="recipient-email">
            </div>
            <div class="form-group">
                <label for="recipient-telefone" class="control-label">Telefone:</label>
                <input type="text" name="telefone" class="form-control" id="recipient-telefone">
            </div>
            <div class="form-group">
                <label for="recipient-responsavel" class="control-label">Respons??vel:</label>
                <input type="text" name="responsavel" class="form-control" id="recipient-responsavel">
            </div>
            <div class="form-group">
                <label for="recipient-observacao" class="control-label">Observa??oes:</label>
                <input type="text" name="observacao" class="form-control" id="recipient-observacao">
            </div>
            <div class="form-group">
                <label for="recipient-status" class="control-label">Status:</label>
                <select name="status">
                    <option value="ativa">Ativa</option>
                    <option value="inativa">Inativa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-arquivo" class="control-label">Certificado:</label>
                <input class="form-control" type="file" name="arquivo"><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="Submit" value="Cadastrar" class="btn btn-primary btn-sm">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- End Cad alvara -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">??</span>
            </button>
        </div>
        <div class="modal-body">Voc?? realmente deseja sair ?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="logout.php">Sim</a>
        </div>
    </div>
</div>
</div>
<!-- Confirmar Modal -->
<div class="modal fade" id="confirmaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">??</span>
            </button>
        </div>
        <div class="modal-body">Voc?? realmente deseja excluir ?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="certificados.php">Sim</a>
        </div>
    </div>
</div>
</div>

<!------------------------------------------------ SCRIPTS -------------------------------------------------------------->

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
<script type="text/javascript">
  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
   var recipient = button.data('whatever')// Extract info from data-* attributes
   var recipientid = button.data('whateverid')
   var recipientvencimento = button.data('whatevervencimento')
   var recipientsenha = button.data('whateversenha')
   var recipientcnpj = button.data('whatevercnpj')
   var recipientemail = button.data('whateveremail')
   var recipienttelefone = button.data('whatevertelefone')
   var recipientresponsavel = button.data('whateverresponsavel')
   var recipientobservacao = button.data('whateverobservacao')
   var recipientsituacao = button.data('whateversituacao')
   var recipientstatus = button.data('whateverstatus')
 

   var modal = $(this)
   //modal.find('.modal-title').text('New message to ' + recipient)
   modal.find('#recipient-certificados').val(recipient)
   modal.find('#recipientid').val(recipientid)
   modal.find('#recipient-vencimento').val(recipientvencimento)
   modal.find('#recipient-senha').val(recipientsenha)
   modal.find('#recipient-cnpj').val(recipientcnpj)
   modal.find('#recipient-email').val(recipientemail)
   modal.find('#recipient-telefone').val(recipienttelefone)
   modal.find('#recipient-responsavel').val(recipientresponsavel)
   modal.find('#recipient-observacao').val(recipientobservacao)
   modal.find('#recipient-status').val(recipientstatus)
   
})
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $("#success-alert").hide();
      $("#myWish").click(function showAlert() {
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function() {
          $("#success-alert").slideUp(500);
      });
    });
  });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#campo').keyup(function(){
            $('form').submit(function(){
                var dados = $(this).val();
                $.ajax({
                    url: 'teste.php',
                    method: 'post',
                    dataType: 'html',
                    data: dados,
                    success: function(data){
                        $('#resultado').html(data);
                    },
                    error: function(){
                        $(".resultado").html("error");
                    }
                });
                return false;
            });
            $('form').trigger('submit');
        });
    });
</script>

</body>

</html>