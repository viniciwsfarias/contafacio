<?php
require "adm/conecta.php";

$get_file = $_GET['id'];
echo $get_file;

$sql = "SELECT arquivo FROM anexo_alvara WHERE id = '".$get_file."' ";
$result = mysqli_query($con, $sql);
echo mysqli_error($con);
 while(list($arquivo ) = mysqli_fetch_array($result)){ 

$file = 'upload/'.$arquivo;
}

header('Content-type: application/pdf');


@readfile($file);

?>