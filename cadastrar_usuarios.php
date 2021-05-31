<?php
require "adm/conecta.php";
ob_start();
session_start();

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
			$nome = "";
			$username = "";
			$password = "";
			$email = "";
			$nivel = "";
			$cargo = "";
			$setor = "";
			$foto = "";
			$id = "";
			}
if(isset($acao)){
	 if($acao== "Salvar"){
		$nome = $_POST['nome'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$nivel = $_POST['nivel'];
		$cargo = $_POST['cargo'];
		$setor = $_POST['setor'];
		$foto = $_POST['foto'];
		$id = $_POST['id'];
		$sql = "Update `usuarios` SET `nome` = '$nome', `username` = '$username', `password` = '$password', `email` = '$email', `cargo` = '$cargo', `nivel` = '$nivel', `setor` = '$setor', `foto` = '$foto' WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql);
		echo mysqli_error($con);
		echo "ATUALIZADO COM SUCESSO!";
		$acao = "Cadastrar";
		ob_start();
		header("Location: usuarios.php");
		
	}else if($acao== "Cadastrar"){
		$nome = $_POST['nome'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$nivel = $_POST['nivel'];
		$cargo = $_POST['cargo'];
		$setor = $_POST['setor'];
		$foto = $_POST['foto'];
		$sql = "INSERT into `usuarios` (`nome`, `username`, `password`, `email`, `nivel`, `cargo`, `setor`, `foto`) VALUES ('$nome', '$username', '$password', '$email', '$nivel', '$cargo', '$setor', '$foto');";
		$result = mysqli_query($con, $sql) or die ("executar insert".mysqli_error());
		ob_start();
		echo $_SESSION['msg'] = "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
		header("Location: usuarios.php");
			}else if($acao== "Excluir"){
		$id = $_GET['id'];
		$sql = "delete from `usuarios` WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql)  or die ("executar update".mysqli_error());
		$acao = "Cadastrar";
		ob_start();
		header("Location: usuarios.php");
              	}
	
}else{
	$acao = "Cadastrar";
}


?>