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
			$data = "";
			$prazo = "";
			$status = "";
			$protocolo = "";
			$email = "";
			$telefone = "";
			$responsavel = "";
			$situacao = "";
			$observacao = "";
			$id = "";
			}
if(isset($acao)){
	 if($acao== "Salvar"){
		$empresa = $_POST['empresa'];
		$data = $_POST['data'];
		//$prazo = $_POST['prazo'];
		//$status = $_POST['status'];
		$protocolo = $_POST['protocolo'];
		$situacao = $_POST['situacao'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$responsavel = $_POST['responsavel'];
		//$situacao = $_POST['situacao'];
		$observacao = $_POST['observacao'];
		$id = $_POST['id'];
		$sql = "Update `vigilancia` SET `empresa` = '$empresa', `data` = '$data', `protocolo` = '$protocolo', `situacao` = '$situacao', `email` = '$email', `telefone` = '$telefone', `responsavel` = '$responsavel', `observacao` = '$observacao' WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql);
		echo mysqli_error($con);
		echo "ATUALIZADO COM SUCESSO!";
		$acao = "Cadastrar";
		ob_start();
		header("Location: alvara.php");
		
	}else if($acao== "Cadastrar"){
		$days = $_POST['data'];
		$x = expirar($days);

		$empresa = $_POST['empresa'];
		$data = $_POST['data'];
		$prazo = $x. " dias para expirar";
		$protocolo = $_POST['protocolo'];
		if($protocolo > 0){
			$status = "Protocolo enviado!";
		}else {
			$status = "";
		}
		$situacao = $_POST['situacao'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$responsavel = $_POST['responsavel'];
		//$situacao = $_POST['situacao'];
		$observacao = $_POST['observacao'];
		$sql = "INSERT into `vigilancia` (`empresa`, `data`, `prazo`, `status`, `protocolo`, `situacao`, `email`, `telefone`, `responsavel`, `observacao`) VALUES ('$empresa', '$data', '$prazo', '$status', '$protocolo', '$situacao', '$email', '$telefone', '$responsavel', '$observacao');";
		$result = mysqli_query($con, $sql) or die ("executar insert".mysqli_error());
		ob_start();
		echo $_SESSION['msg'] = "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
		header("Location: alvara.php");
			}else if($acao== "Excluir"){
		$id = $_GET['id'];
		$sql = "delete from `vigilancia` WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql)  or die ("executar update".mysqli_error());
		$acao = "Cadastrar";
		ob_start();
		header("Location: alvara.php");
              	}
	
}else{
	$acao = "Cadastrar";
}


?>