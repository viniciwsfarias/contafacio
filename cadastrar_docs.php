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
			$JC_adit = "";
			$JC_firma = "";
			$JC_capa = "";
			$JC_doc = "";
			$JC_taxas = "";
			$LTO_livro = "";
			$RR_reque = "";
			$RR_fac = "";
			$RR_doc = "";
			$RR_taxas = "";
			$PREF_fac = "";
			$PREF_alvara = "";
			$PREF_bomb = "";
			$PREF_doc = "";
			$PREF_iptu = "";
			$PREF_doc_socio = "";
			$PREF_crc = "";
			$PREF_crc_end = "";
			$PREF_alvara_cont = "";
			$PREF_cont_cont = "";
			$PREF_taxas = "";
			$BB_protocolo = "";
			$BB_certi = "";
			$BB_vitoria = "";
			$REC_dbe = "";
			$REC_proc_pf = "";
			$REC_proc_pj = "";
			$PROC_rfb = "";
			$PROC_icp = "";
			$PROC_certi = "";
			$DOM_cad = "";
			}
if(isset($acao)){
	 if($acao== "Salvar"){
		if($_POST['JC_adit']){
			$JC_adit = 1;
		}if($_POST['JC_firma']){
			$JC_firma = 1;
		}if($_POST['JC_capa']){
			$JC_capa = 1;
		}if($_POST['JC_doc']){
			$JC_doc = 1;
		}if($_POST['JC_taxas']){
			$JC_taxas = 1;
		}if($_POST['LTO_livro']){
			$LTO_livro = 1;
		}if($_POST['RR_reque']){
			$RR_reque = 1;
		}if($_POST['RR_fac']){
			$RR_fac = 1;
		}if($_POST['RR_doc']){
			$RR_doc = 1;
		}if($_POST['RR_taxas']){
			$RR_taxas = 1;
		}if($_POST['PREF_fac']){
			$PREF_fac = 1;
		}if($_POST['PREF_alvara']){
			$PREF_alvara = 1;
		}if($_POST['PREF_bomb']){
			$PREF_bomb = 1;
		}if($_POST['PREF_doc']){
			$PREF_doc = 1;
		}if($_POST['PREF_iptu']){
			$PREF_iptu = 1;
		}if($_POST['PREF_doc_socio']){
			$PREF_doc_socio = 1;
		}if($_POST['PREF_crc']){
			$PREF_crc = 1;
		}if($_POST['PREF_crc_end']){
			$PREF_crc_end = 1;
		}if($_POST['PREF_alvara_cont']){
			$PREF_alvara_cont = 1;
		}if($_POST['PREF_cont_cont']){
			$PREF_cont_cont = 1;
		}if($_POST['PREF_taxas']){
			$PREF_taxas = 1;
		}if($_POST['BB_protocolo']){
			$BB_protocolo = 1;
		}if($_POST['BB_certi']){
			$BB_certi = 1;
		}if($_POST['BB_vistoria']){
			$BB_vistoria = 1;
		}if($_POST['REC_dbe']){
			$REC_dbe = 1;
		}if($_POST['REC_proc_pf']){
			$REC_proc_pf = 1;
		}if($_POST['REC_proc_pj']){
			$REC_proc_pj = 1;
		}if($_POST['PROC_rfb']){
			$PROC_rfb = 1;
		}if($_POST['PROC_icp']){
			$PROC_icp = 1;
		}if($_POST['PROC_certi']){
			$PROC_certi = 1;
		}if($_POST['DOM_cad']){
			$DOM_cad = 1;
		}
		$id = $_GET['id'];
		$sql = "Update `processos` SET `JC_adit` = '$JC_adit', `JC_firma` = '$JC_firma', `JC_capa` = '$JC_capa', `JC_doc` = '$JC_doc', `JC_taxas` = '$JC_taxas', `LTO_livro` = '$LTO_livro', `RR_reque` = '$RR_reque', `RR_fac` = '$RR_reque', `RR_fac` = '$RR_fac', `RR_doc` = '$RR_doc', `RR_taxas` = '$RR_taxas', `PREF_fac` = '$PREF_fac', `PREF_alvara` = '$PREF_alvara', `PREF_bomb` = '$PREF_bomb', `PREF_doc` = '$PREF_doc', `PREF_iptu` = '$PREF_iptu', `PREF_doc_socio` = '$PREF_doc_socio', `PREF_crc` = '$PREF_crc', `PREF_crc_end` = '$PREF_crc_end', `PREF_alvara_cont` = '$PREF_alvara_cont', `PREF_cont_cont` = '$PREF_cont_cont', `PREF_taxas` = '$PREF_taxas', `BB_protocolo` = '$BB_protocolo', `BB_certi` = '$BB_certi', `BB_vistoria` = '$BB_vistoria', `REC_dbe` = '$REC_dbe', `REC_proc_pf` = '$REC_proc_pf', `REC_proc_pj` = '$REC_proc_pj', `PROC_rfb` = '$PROC_rfb', `PROC_icp` = '$PROC_icp', `PROC_certi` = '$PROC_certi', `DOM_cad` = '$DOM_cad' WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql);
		echo mysqli_error($con);
		echo "ATUALIZADO COM SUCESSO!";
		$acao = "Cadastrar";
		ob_start();
		header("Location: novo_processo.php?id=".$id.'');
		
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