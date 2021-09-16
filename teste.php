<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title></title>
    <script src="jquery-2.1.4.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style type="text/css">
    .content.active {
  display:block;
}
.content {
  display:none;
}
</style>
</head>
<body>
   <form action="teste.php">
    Buscar por: <input type="text" name="campo" id="campo">
</form>
<div id="resultado">
    <?php 
    $campo="%".$_POST['campo']."%";

        require "adm/conecta.php";

        $sql = "SELECT processo_id, empresa, alteracao FROM processos WHERE empresa like '".$campo."' ";
        $result = mysqli_query($con, $sql);
        echo mysqli_error($con);

        echo "
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>Alteração</th>
                    </tr>
                </thead>
                <tbody>
        ";
        while(list($processo_id, $empresa, $alteracao) = mysqli_fetch_array($result)){
            echo "
                <tr>
                    <td>$processo_id</td>
                    <td>$empresa</td>
                    <td>$alteracao</td>
            ";
        } 
        echo " </tbody>
        </table>
        ";
    ?>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#campo').keyup(function(){
            $('form').submit(function(){
                var dados = $(this).serialize();
                $.ajax({
                    url: 'teste.php',
                    method: 'post',
                    dataType: 'html',
                    data: dados,
                    success: function(data){
                        $('#resultado').empty().html(data);
                    }
                });
                return false;
            });
            $('form').trigger('submit');
        });
    });
</script>
</html>

