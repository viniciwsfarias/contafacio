<?php
require "adm/conecta.php"; // Conexão com o banco de dados
//require "../adm/include/erro.php"; // Conexão com o banco de dados
ob_start();
session_start(); // Inicia sessões
function no_acento($string){
// Dezacentua string.
// Criado por Jonathan Cardozo e Douglas Brucieri
// 17 Ago 2006
// Caracteres Acentuados
$chars_from = array(	  ".","-","/",",","*",
						  "à","á","â","ã","ä",
						  "è","é","ê","ë",
						  "ì","í","î","ï",
						  "ò","ó","ô","õ","ö",
						  "ù","ú","û","ü",
						  "ç",
						  "À","Á","Â","Ã","Ä",
						  "È","É","Ê","Ë",
						  "Ì","Í","Î","Ï",
						  "Ò","Ó","Ô","Õ","Ö",
						  "Ù","Ú","Û","Ü",
						  "Ç",
						  ":","º","ª","~","^",
						  "´","`","¨","¦","§",
						  "€","_"," ","[","]",
						  "(",")");

// Caracteres Dezacentuados
$chars_to = array(        "","","","","",
						  "a","a","a","a","a",
						  "e","e","e","e",
						  "i","i","i","i",
						  "o","o","o","o","o",
						  "u","u","u","u",
						  "c",
						  "A","A","A","A","A",
						  "E","E","E","E",
						  "I","I","I","I",
						  "O","O","O","O","O",
						  "U","U","U","U",
						  "C",
						  "","","","","",
						  "","","","","",
						  "","","","","",
						  "","");
return str_replace($chars_from,$chars_to,$string);
}
$login = $_POST["username"]; // Recupera o login
$senha = $_POST["password"];

if(!$login || !$senha){ // Usuário não forneceu a senha ou o login
	$_SESSION['msg'] = "<div class='alert alert-danger'>Informe os dados!</div>";
header("Location: index.php");
}	
	$sql = "SELECT * FROM usuarios WHERE username = '" . $login . "'";
	$result = mysqli_query($con,$sql); //or die("Erro no banco de dados!");
	echo mysqli_error($con);
	$total = mysqli_num_rows($result);

if($total)
{	
    $dados = @mysqli_fetch_array($result);
    if(!strcmp($senha, $dados["password"]))
    { 
    $_SESSION["id"] = $dados["id"];  
    $_SESSION["nome"] = stripslashes($dados["nome"]);
    $_SESSION["username"] = $dados["username"];
    $_SESSION["email"] = $dados["email"];
    $_SESSION["cargo"] = $dados["cargo"];
    $_SESSION["setor"] = $dados["setor"];
    $_SESSION["nivel"] = $dados["nivel"];

	header("Location: home.php");	
	
	exit;
	}else{
		ob_start();
		$_SESSION['msg'] = "<div class='alert alert-danger'>Login e senha incorretos!</div>";
		header("Location: index.php");
		ob_end_clean();
    }
}else{

	ob_start();
	$_SESSION['msg'] = "<div class='alert alert-danger'>Usuario inexistente!!</div>";
	header("Location: index.php");
	ob_end_clean();
}
?>