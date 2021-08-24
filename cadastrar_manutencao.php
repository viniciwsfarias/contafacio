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
			$computador = "";
			$usuario = "";
			$data = "";
			$problema = "";
			$manutencao = "";
			$obs = "";
			$status = "";
			$id = "";
			}
if(isset($acao)){
	 if($acao== "Salvar"){
		$computador = $_POST['computador'];
		$usuario = $_POST['usuario'];
		$data = $_POST['data'];
		$problema = $_POST['problema'];
		$manutencao = $_POST['manutencao'];
		$obs = $_POST['obs'];
		$status = $_POST['status'];
		$id = $_POST['id'];
		$sql = "Update `manutencao` SET `computador` = '$computador', `usuario` = '$usuario', `data` = '$data', `problema` = '$problema', `manutencao` = '$manutencao', `obs` = '$obs', `status` = '$status' WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql);
		echo mysqli_error($con);
		echo "ATUALIZADO COM SUCESSO!";
		$acao = "Cadastrar";
		ob_start();
		header("Location: manutencao.php");
		
	}else if($acao== "Cadastrar"){
		
		$computador = $_POST['computador'];
		$usuario = $_POST['usuario'];
		$data = $_POST['data'];
		$problema = $_POST['problema'];
		$manutencao = $_POST['manutencao'];
		$obs = $_POST['obs'];
		$status = $_POST['status'];
		$sql = "INSERT into `manutencao` (`computador`, `usuario`, `data`, `problema`, `manutencao`, `obs`, `status`) VALUES ('$computador', '$usuario', '$data', '$problema', '$manutencao', '$obs', '$status');";
		$result = mysqli_query($con, $sql) or die ("executar insert".mysqli_error());	
		ob_start();
		echo $_SESSION['msg'] = "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
		header("Location: manutencao.php");
			}else if($acao== "Excluir"){
		$id = $_GET['id'];
		$sql = "delete from `manutencao` WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql)  or die ("executar update".mysqli_error());
		$acao = "Cadastrar";
		ob_start();
		header("Location: manutencao.php");
              	}
              
	
}else{
	$acao = "Cadastrar";
}


?>