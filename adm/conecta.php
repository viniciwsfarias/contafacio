<?php

$con = mysqli_connect("contafacio.mysql.dbaas.com.br", "contafacio","conta@2021","contafacio");


   if (mysqli_connect_errno()) {
     
        echo "Não foi possível conectar ao banco de dados ".mysqli_connect_error();
        die();
    }
 mysqli_set_charset($con,"utf8");
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: text/html; charset=iso-8859-1",true) ;
//header("Content-Type: text/html; charset=utf-8",true) ;

?>