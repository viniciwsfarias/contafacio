<?php
 require "adm/conecta.php";

 $campo="%".$_POST['campo']."%";

 $sql = "SELECT processo_id, empresa, alteracao, descricao, doc, data_entrada, data_conclusao, protocolo, cnpj, status, situacao, info, responsavel FROM processos WHERE empresa like '".$campo."' ";
        $result = mysqli_query($con, $sql);
        echo mysqli_error($con);

        while(list($processo_id, $empresa, $alteracao, $descricao, $doc, $data_entrada, $data_conclusao, $protocolo, $cnpj, $status, $situacao, $info, $responsavel ) = mysqli_fetch_array($result)){
            echo "
                <div class='col-xl-4 col-md-6 mb-4'>
                    <div class='card shadow h-100 py-2'>
                        <div class='card-body'>
                            <div class='row no-gutters align-items-center'>
                                <div class='col mr-2'>
                                    <div class='h5 mb-0 font-weight-bold text-gray-800'> $empresa; 
                                    </div>
                                    <div class='text-xs font-weight-bold text-success text-uppercase mb-1'>
                                    $alteracao; 
                                    </div>                  
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }  
        
?>