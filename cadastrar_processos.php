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
			$empresa = "";
			$alteracao = "";
			$descricao = "";
			$doc = "";
			$data_entrada = "";
			$data_conclusao = "";
			$protocolo = "";
			$cnpj = "";
			$status = "";
			$situacao = "";
			$info = "";
			$responsavel = "";
			$id = "";
			}
if(isset($acao)){
	 if($acao== "Salvar"){
		$empresa = $_POST['empresa'];
		$alteracao = $_POST['alteracao'];
		$descricao = $_POST['descricao'];
		$doc = $_POST['doc'];
		$data_entrada = $_POST['data_entrada'];
		$data_conclusao = $_POST['data_conclusao'];
		$protocolo = $_POST['protocolo'];
		$cnpj = $_POST['cnpj'];
		$status = $_POST['status'];
		$situacao = $_POST['situacao'];
		$info = $_POST['info'];
		$responsavel = $_POST['responsavel'];
		$id = $_POST['id'];
		$sql = "Update `processos` SET `empresa` = '$empresa', `alteracao` = '$alteracao', `descricao` = '$descricao', `doc` = '$doc', `data_entrada` = '$data_entrada', `data_conclusao` = '$data_conclusao', `cnpj` = '$cnpj', `status` = '$status', `situacao` = '$situacao', `info` = '$info', `responsavel` = '$responsavel' WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql);
		echo mysqli_error($con);
		echo "ATUALIZADO COM SUCESSO!";
		$acao = "Cadastrar";
		ob_start();
		header("Location: processos.php");
		
	}else if($acao== "Cadastrar"){

		$empresa = $_POST['empresa'];
		$alteracao = $_POST['alteracao'];
		$descricao = $_POST['descricao'];
		$doc  = $_POST['doc'];
		$data_entrada = $_POST['data_entrada'];
		$data_conclusao = $_POST['data_conclusao'];
		$protocolo = $_POST['protocolo'];
		$cnpj = $_POST['cnpj'];
		$status = $_POST['status'];
		$situacao = $_POST['situacao'];
		$info = $_POST['info'];
		$responsavel = $_POST['responsavel'];
		
		$sql = "INSERT into `processos` (`empresa`, `alteracao`, `descricao`, `doc`, `data_entrada`, `data_conclusao`, `protocolo`, `cnpj`, `status`, `situacao`, `info`, `responsavel`) VALUES ('$empresa', '$alteracao', '$descricao', '$doc', '$data_entrada', '$data_conclusao', '$protocolo', '$cnpj', '$status', '$situacao', '$info', '$responsavel');";
		$result = mysqli_query($con, $sql) or die ("executar insert".mysqli_error());	
		ob_start();
		echo $_SESSION['msg'] = "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
		header("Location: processos.php");
			}else if($acao== "Excluir"){
		$id = $_GET['id'];
		$sql = "delete from `processos` WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql)  or die ("executar update".mysqli_error());
		$acao = "Cadastrar";
		ob_start();
		header("Location: processos.php");
              	}
              
	
}else{
	$acao = "Cadastrar";
}


?>