<?php
require "adm/conecta.php"; // Conexão com o banco de dados

session_start();

if(!isset($_SESSION['nome']) || !isset($_SESSION['nome'])){
	header("Location: index.php");
	exit;
}
?>