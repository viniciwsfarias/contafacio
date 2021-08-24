<?php
require "adm/conecta.php";
ob_start();
session_start();

function day($dias){
	$antigo = $days;
	$novo = date('d-m-Y');
	return $novo;
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

if(isset($_POST['Submit'])){
$acao = $_POST['Submit'];
echo $acao;
}else{
			$certificados = "";
			$vencimento = "";
			$senha = "";
			$cnpj = "";
			$status = "";
			$protocolo = "";
			$email = "";
			$telefone = "";
			$responsavel = "";
			$situacao = "";
			$observacao = "";
			$status = "";
			$id = "";
			}
if(isset($acao)){
	 if($acao== "Salvar"){
		$certificados = $_POST['certificados'];
		$vencimento = $_POST['vencimento'];
		$senha = $_POST['senha'];
		//$status = $_POST['status'];
		$cnpj = $_POST['cnpj'];
		//$situacao = $_POST['situacao'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$responsavel = $_POST['responsavel'];
		//$situacao = $_POST['situacao'];
		$observacao = $_POST['observacao'];
		$status = $_POST['status'];
		$id = $_POST['id'];
		$sql = "Update `certificados` SET `certificados` = '$certificados', `vencimento` = '$vencimento', `senha` = '$senha', `cnpj` = '$cnpj', `email` = '$email', `telefone` = '$telefone', `responsavel` = '$responsavel', `observacao` = '$observacao', `status` = '$status' WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql);
		echo mysqli_error($con);
		echo "ATUALIZADO COM SUCESSO!";
		$acao = "Cadastrar";
		ob_start();
		header("Location: certificados.php");
		
	}else if($acao== "Cadastrar"){
		$days = $_POST['data'];
		$x = expirar($days);

		$certificados = $_POST['certificados'];
		$vencimento = $_POST['vencimento'];
		$senha = $_POST['senha'];
		$cnpj = $_POST['cnpj'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$responsavel = $_POST['responsavel'];
		//$situacao = $_POST['situacao'];
		$observacao = $_POST['observacao'];
		$status = $_POST['status'];
		$ext = strtolower(substr($_FILES['arquivo']['name'], -4));
        $nome = $_FILES['arquivo']['name'];
        $new_name = $nome.$ext;
        $diretorio = "upload/certificados/";

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$new_name);

		$sql = "INSERT into `certificados` (`certificados`, `vencimento`, `senha`, `cnpj`, `email`, `telefone`, `responsavel`, `observacao`, `status`, `arquivo`) VALUES ('$certificados', '$vencimento', '$senha', '$cnpj', '$email', '$telefone', '$responsavel', '$observacao', '$status', '$new_name');";
		$result = mysqli_query($con, $sql) or die ("executar insert".mysqli_error());	
		ob_start();
		echo $_SESSION['msg'] = "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
		header("Location: certificados.php");
			}else if($acao== "Excluir"){
		$id = $_GET['id'];
		$sql = "delete from `certificados` WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql)  or die ("executar update".mysqli_error());
		$acao = "Cadastrar";
		ob_start();
		header("Location: certificados.php");
              	}
              
	
}else{
	$acao = "Cadastrar";
}


?>