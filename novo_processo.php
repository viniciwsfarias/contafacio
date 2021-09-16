<?php
require "adm/conecta.php";
ob_start();
session_start();

$id = $_GET['id'];

$sql ="SELECT * FROM processos where processo_id = '".$id."' ";
$result = mysqli_query($con, $sql);
    echo mysqli_error($con);
    $total = mysqli_num_rows($result);

if($total)
{   
    $dados = @mysqli_fetch_array($result);
     
    $processo_id = $dados["processo_id"]; 
    $empresa = $dados["empresa"];  
    $alteracao = $dados["alteracao"];
    $protocolo = $dados["protocolo"];
    if($protocolo){
        $prot = $protocolo;
    }else{
        $prot = "Aguardando";
    }
    $cnpj = $dados["cnpj"];
    $status = $dados['status'];
    $situacao = $dados['situacao'];
   

   
    }


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
    $pesquisar = $_POST['pesquisar'];
    $tipo = $_POST['tipo'];
}else{
    $pesquisar = "";
    $tipo = "empresa";
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
.content.active {
  display:block;
}
.content {
  display:none;
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
                <i class="fas fa-scroll"></i>
                <span>Setor Pessoal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-book-open"></i>
                    <span>Setor Contábil</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-signature"></i>
                        <span>Setor Fisco-Contábil</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-stamp"></i>
                            <span>Setor Fiscal</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user-tie"></i>
                                <span>Diretotia</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="legalizacao.php">
                                    <i class="fas fa-certificate"></i>
                                    <span>Legalização</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ti.php">
                                        <i class="fas fa-tv"></i>
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
    

<?php
    $sql = "SELECT * FROM processos WHERE processo_id = '".$id."' ";
    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);
    $total = mysqli_num_rows($result);
    if($total){   
        while($dados = @mysqli_fetch_array($result)){


            ?>
            <div class="row">
                <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Empresa:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $empresa; ?></div>
                                        </div> 
                                        <div class="col mr-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Alteração:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $alteracao; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                CNPJ:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cnpj; ?></div>
                                        </div> 
                                        <div class="col mr-4">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Protocolo:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $prot; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">Status: <?php echo $situacao; ?>
                        </div>
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $status; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><?php echo $status; ?>%
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-xl-6 col-lg-5 mb-4">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                Anexar Documentos                               
                                <button class="btn btn-primary float-right" type="button"data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="iconx">
                                    <i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form method="POST" action="cadAnexo.php?processo_id=<?php echo $processo_id; ?>&tipo=4" enctype="multipart/form-data">
                                        <label>Nome:</label>
                                        <input type="text" name="nome" placeholder="nome do arquivo"><br>
                                        <label>Arquivo:</label>
                                        <input type="file" name="arquivo"><br>
        
                                </div>
                                <div class="modal-footer">
                                   <input type="Submit" name="Submit" value="Cadastrar">
                               </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div class="col-xl-6 col-lg-5 mb-4">
                <div class="card">
                    <div class="card-header">
                        Documentos Anexados
                    </div>
                    <div class="card-body">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Arquivo</th>
                                    <th>Opçoes</th>
                                </tr>
                            </thead>
                            <?php 
                                $sql1 = "SELECT nome, arquivo FROM anexo_processo WHERE processo_id = '".$dados["processo_id"]."'  ";
                                $result = mysqli_query($con, $sql1);
                                echo mysqli_error($con);
                                if(mysqli_num_rows($result)==0){
                                    }else{
                                        while(list($nome, $arquivo ) = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $arquivo; ?></td>
                                    <td>baixar</td> 
                                </tr>
                            </tbody>
                        <?php }} ?>
                        </table>
                    </div>
                </div>
            </div>                
        </div>  

        <div class="row">
            <div class="col-xl-6 col-lg-5 mb-4">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                Informações Adicionais                               
                                <button class="btn btn-primary float-right" type="button"data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo" id="iconx">
                                    
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php echo $dados['info']; ?>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 


            <div class="row">
                <div class="col-xl-12 col-lg-7">
                    <div class="accordion" id="accordionExample">
                        <div class="card shadow mb-4">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Documentação <i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form  class="form-horizontal" method="POST" action="cadastrar_docs.php?id=<?php echo $processo_id; ?>">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Junta Comercial
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="JC_adit" id="JC_adit" <?php $valor = $dados['JC_adit']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                           04 vias do aditivo/Requerimento Empresarial
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="JC_firma" id="JC_firma" <?php $valor = $dados['JC_firma']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            Reconhecer firma dos Sócios
                                                            </label>
                                                        </div> 
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="JC_capa" id="JC_capa" <?php $valor = $dados['JC_capa']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            04 vias da Capa(Rede Sim)
                                                            </label>
                                                        </div> 
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="JC_doc" id="JC_doc" <?php $valor = $dados['JC_doc']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cópia dos Documentos                         
                                                           </label>
                                                        </div> 
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="JC_taxas" id="JC_taxas" <?php $valor = $dados['JC_taxas']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Taxas
                                                           </label>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">                                              
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Prefeitura</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_fac" id="PREF_fac" <?php $valor = $dados['PREF_fac']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                           FAC municipal
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_alvara" id="PREF_alvara" <?php $valor = $dados['PREF_alvara']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            Alvará Original
                                                            </label>
                                                        </div> 
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_bomb" id="PREF_bomb" <?php $valor = $dados['PREF_bomb']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            Cópia do certificado dos Bombeiros
                                                            </label>
                                                        </div> 
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_doc" id="PREF_doc" <?php $valor = $dados['PREF_doc']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?>>
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cópia dos documentos                         
                                                           </label>
                                                        </div> 
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_iptu" id="PREF_iptu" <?php $valor = $dados['PREF_iptu']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Certidão do IPTU
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_doc_socio" id="PREF_doc_socio" <?php $valor = $dados['PREF_doc_socio']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cópia do RG, CPF e comprovante de residência dos sócios
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_crc" id="PREF_crc" <?php $valor = $dados['PREF_crc']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cópia de certidão de regularidade do Contador
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_crc_end" id="PREF_crc_end" <?php $valor = $dados['PREF_crc_end']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cópia da carterinha CRC e comprovante de residência
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_alvara_cont" id="PREF_alvara_cont" <?php $valor = $dados['PREF_alvara_cont']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cópia do alvará do contador
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_cont_cont" id="PREF_cont_cont" <?php $valor = $dados['PREF_cont_cont']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               E-mail e telefone do sócio e do contador
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PREF_taxas" id="PREF_taxas" <?php $valor = $dados['PREF_taxas']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Taxas
                                                           </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Livro termo de ocorrência</h6>
                                                    </div>
                                                    <div class="card-body">
                                                      <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="true" name="LTO_livro" id="LTO_livro" <?php $valor = $dados['LTO_livro']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                        <label class="form-check-label" for="defaultCheck1">
                                                           Autenticar livro termo de ocorrência
                                                       </label>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Bombeiros</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="BB_protocolo" id="BB_protocolo" <?php $valor = $dados['BB_protocolo']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Protocolo site dos Bombeiros
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="BB_certi" id="BB_certi" <?php $valor = $dados['BB_certi']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Certificado dos Bombeiros
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="BB_vistoria" id="BB_vistoria" <?php $valor = $dados['BB_vistoria']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Vistoria
                                                           </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Recebedoria de rendas</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="RR_reque" id="RR_reque" <?php $valor = $dados['RR_reque']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                           02 vias do requerimento
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="RR_fac" id="RR_fac" <?php $valor = $dados['RR_fac']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               FAC Estadual
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="RR_doc" id="RR_doc" <?php $valor = $dados['RR_doc']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cópia autenticada dos documentos
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="RR_taxas" id="RR_taxas" <?php $valor = $dados['RR_taxas']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Taxas
                                                           </label>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Receita</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="REC_dbe" id="REC_dbe" <?php $valor = $dados['REC_dbe']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               BDE
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="REC_proc_pf" id="REC_proc_pf" <?php $valor = $dados['REC_proc_pf']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Procuração PF dos sócios
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="REC_proc_pj" id="REC_proc_pj" <?php $valor = $dados['REC_proc_pj']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Procuração PJ
                                                           </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Procuração RFB, ICP e Certificado Digital</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PROC_rfb" id="PROC_rfb" <?php $valor = $dados['PROC_rfb']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Procuração RFB PF e PJ
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PROC_icp" id="PROC_icp" <?php $valor = $dados['PROC_icp']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Procuração ICP
                                                           </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="PROC_certi" id="PROC_certi" <?php $valor = $dados['PROC_certi']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Certificado Digital
                                                           </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Sistema Domínio</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="true" name="DOM_cad" id="DOM_cad" <?php $valor = $dados['DOM_cad']; if ($valor == 1){ echo 'checked="true"'; } else{ } ?> >
                                                            <label class="form-check-label" for="defaultCheck1">
                                                               Cadastrar, alterar ou inativar
                                                           </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!-- fim form --> 
                                </div><!-- fim card body -->   
                                <div class="card-footer">
                                    <button type="submit" name="Submit" value="Salvar" class="btn btn-primary btn-sm">Salvar</button>                  
                                    </form>
                                </div>
                            </div>    <!-- fim collapse one -->
                        </div><!-- fim card -->
                    </div><!-- fim collapse -->
                </div><!-- fim -->
            </div><!-- fim row -->
        


<?php }} ?> 


<!---------------------------------------------------------------------------------->

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title align-items-center" id="exampleModalLabel">Editar</h4>
    </div>
    <div class="modal-body">
        <form  class="form-horizontal" method="POST" action="cadastrar_alvara.php">
            <div class="form-group">
                <label for="recipientid" class="control-label">ID:</label>
                <input type="text" name="id" class="form-control" id="recipientid">
            </div>
            <div class="form-group">
                <label for="recipientEmpresa" class="control-label">Empresa:</label>
                <input type="text" name="empresa" class="form-control" id="recipientEmpresa">
            </div>
            <div class="form-group">
                <label for="recipient-data" class="control-label">Data:</label>
                <input type="text" name="data" class="form-control" id="recipientdata" >
            </div>
            <div class="form-group">
                <label for="recipient-protocolo" class="control-label">Protocolo:</label>
                <input type="text" name="protocolo" class="form-control" id="recipient-protocolo">
            </div>
            <div class="form-group">
                <label for="recipient-situacao" class="control-label">Situação:</label>
                <input type="text" name="situacao" class="form-control" id="recipient-situacao">
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
                <label for="recipient-responsavel" class="control-label">Responsável:</label>
                <input type="text" name="responsavel" class="form-control" id="recipient-responsavel">
            </div>
            <div class="form-group">
                <label for="recipient-observacao" class="control-label">Observaçoes:</label>
                <input type="text" name="observacao" class="form-control" id="recipient-observacao">
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

<!-- Cad Alvara Modal -->
<div class="modal fade" id="cadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
    </div>
    <div class="modal-body">
        <form  class="form-horizontal" method="POST" action="cadastrar_processos.php">
            <div class="form-group">
                <label for="recipient-empresa" class="control-label">Empresa:</label>
                <input type="text" name="empresa" class="form-control" id="recipient-empresa">
            </div>
            <div class="form-group">
                <label for="recipient-cnpj" class="control-label">CNPJ:</label>
                <input type="text" name="cnpj" class="form-control" id="recipient-cnpj">
            </div>
            <div class="form-group">
                <label for="recipient-alteracao" class="control-label">Alteração:</label>
                <input type="text" name="alteracao" class="form-control" id="recipient-alteracao">
            </div>
            <div class="form-group">
                <label for="recipient-descricao" class="control-label">Descrição:</label>
                <input type="text" name="descricao" class="form-control" id="recipient-descricao">
            </div>
            <div class="form-group">
                <label for="recipient-doc" class="control-label">Documentação:</label>
                <input type="text" name="doc" class="form-control" id="recipient-doc">
            </div>
            <div class="form-group">
                <label for="recipient-data_entrada" class="control-label">Data Entrada:</label>
                <input type="date" name="data_entrada" class="form-control" id="recipient-data_entrada">
            </div>
            <div class="form-group">
                <label for="recipient-data_conclusao" class="control-label">Data Conclusao:</label>
                <input type="date" name="data_conclusao" class="form-control" id="recipient-data_conclusao">
            </div>
            <div class="form-group">
                <label for="recipient-protocolo" class="control-label">Protocolo:</label>
                <input type="text" name="protocolo" class="form-control" id="recipient-protocolo">
            </div>
            <div class="form-group">
                <label for="recipient-observacao" class="control-label">Status:</label>
                <select name="status" class="form-control" id="recipient-status">
                    <option value="10">Abertura</option>
                    <option value="20">Redesim</option>
                    <option value="30">Coletor</option>
                    <option value="40">DBE</option>
                    <option value="50">Redesim</option>
                    <option value="60">Aditivo</option>
                    <option value="70">Assinatura</option>
                    <option value="80">Protocolo</option>
                    <option value="90">Redesim</option>
                    <option value="100">Concluído</option>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-situacao" class="control-label">Situação:</label>
                <input type="text" name="situacao" class="form-control" id="recipient-situacao">
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

<!-- End Modal vigilancia alvara -->

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
        <div class="modal-body">Você realmente deseja sair ?</div>
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
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Você realmente deseja excluir ?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="alvara.php">Sim</a>
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
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
   var recipient = button.data('whatever')// Extract info from data-* attributes
   var recipientid = button.data('whateverid')
   var recipientalteracao = button.data('whateveralteracao')
   var recipientdescricao = button.data('whateverdescricao')
   var recipientdoc = button.data('whateverdoc')
   var recipientdataentrada = button.data('whateverdata_entrada')
   var recipientdataconclusao = button.data('whateverdata_conclusao')
   var recipientprotocolo = button.data('whateverprotocolo')
   var recipientcnpj = button.data('whatevercnpj')
   var recipientstatus = button.data('whateverstatus')
   var recipientsituacao = button.data('whateversituacao')

   var modal = $(this)
   //modal.find('.modal-title').text('New message to ' + recipient)
   modal.find('#recipient-empresa').val(recipient)
   modal.find('#recipientid').val(recipientid)
   modal.find('#recipient-alteracao').val(recipientalteracao)
   modal.find('#recipient-descricao').val(recipientdescricao)
   modal.find('#recipient-doc').val(recipientdoc)
   modal.find('#recipient-data_entrada').val(recipientdataentrada)
   modal.find('#recipient-data_conclusao').val(recipientdataconclusao)
   modal.find('#recipient-protocolo').val(recipientprotocolo)
   modal.find('#recipient-cnpj').val(recipientcnpj)
   modal.find('#recipient-status').val(recipientstatus)
   modal.find('#recipient-situacao').val(recipientsituacao)
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
<script>
   $('#iconx').click(function() {
  $(this).find('i').toggleClass('fa-angle-down fa-angle-up');
  $('.content').toggleClass('active');
});
</script>

</body>

</html>