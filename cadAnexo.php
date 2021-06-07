 <?php
 require "adm/conecta.php";
 ob_start();

 $tipo = $_GET['tipo'];
 echo $tipo;
 if($tipo == 1){ // alvara
    echo "entrou alvara";
    if(isset($_POST['Submit'])){
        $acao = $_POST['Submit'];

    }else{

    }
    if($acao == "Cadastrar"){
        $alvara_id = $_GET['alvara_id'];
        $x = "?alvara_id=".$alvara_id;
        if(isset($_FILES['arquivo'])){
            echo "ok";
            $ext = strtolower(substr($_FILES['arquivo']['name'], -4));
            $nome = $_POST['nome'];
            $new_name = $nome.$ext;
            $diretorio = "upload/";
            $categoria = $_POST['categoria'];

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$new_name);

            $sql ="INSERT INTO anexo_alvara (`nome`, `alvara_id`, `arquivo`, `categoria`) VALUES ('$nome', '$alvara_id', '$new_name', '$categoria' ) ";
            $result = mysqli_query($con, $sql);
            echo mysqli_error($con);
            if($result){
                echo "deu certo";
                ob_start();
                header("Location: doc_alvara.php".$x);

            }else{
                echo "nao deu certo";
            }
        }
        else{
            echo "nao ok";
        }
    }else if($acao== "Excluir"){
        $id = $_GET['id'];
        $alvara_id = $_GET['alvara_id'];
        $x = "?alvara_id=".$alvara_id;
        $sql = "delete from `anexo_alvara` WHERE id = '".$id."' ";
        $result = mysqli_query($con, $sql)  or die ("executar update".mysqli_error());
        $acao = "Cadastrar";
        ob_start();
        header("Location: doc_alvara.php".$x);
    }

}else
if($tipo == 2){ //bombeiros
    echo "entrou bombeiro";
    $bombeiro_id = $_GET['bombeiro_id'];
    echo "<br>".$bombeiro_id."<br>";
    $x = "?bombeiro_id=".$bombeiro_id;
    if(isset($_FILES['arquivo'])){
        echo "ok";
        $ext = strtolower(substr($_FILES['arquivo']['name'], -4));
        $nome = $_POST['nome'];
        $new_name = $nome.$ext;
        $diretorio = "upload/";
        $categoria = $_POST['categoria'];

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$new_name);

        $sql ="INSERT INTO anexo_bombeiro (`nome`, `bombeiro_id`, `arquivo`, `categoria`) VALUES ('$nome', '$bombeiro_id', '$new_name', '$categoria' ) ";
        $result = mysqli_query($con, $sql);
        echo mysqli_error($con);
        if($result){
            echo "deu certo";
            ob_start();
            header("Location: doc_bombeiro.php".$x);

        }else{
            echo "nao deu certo";
        }
    }
    else{
        echo "nao ok";
    }

}else
if($tipo == 3){ //vigilancia
    echo "entrou vigilancia";
    $vigilancia_id = $_GET['vigilancia_id'];
    echo "<br>".$bombeiro_id."<br>";
    $x = "?vigilancia_id=".$vigilancia_id;
    if(isset($_FILES['arquivo'])){
        echo "ok";
        $ext = strtolower(substr($_FILES['arquivo']['name'], -4));
        $nome = $_POST['nome'];
        $new_name = $nome.$ext;
        $diretorio = "upload/";
        $categoria = $_POST['categoria'];

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$new_name);

        $sql ="INSERT INTO anexo_vigilancia (`nome`, `vigilancia_id`, `arquivo`, `categoria`) VALUES ('$nome', '$vigilancia_id', '$new_name', '$categoria' ) ";
        $result = mysqli_query($con, $sql);
        echo mysqli_error($con);
        if($result){
            echo "deu certo";
            ob_start();
            header("Location: doc_vigilancia.php".$x);

        }else{
            echo "nao deu certo";
        }
    }
    else{
        echo "nao ok";
    }

}

?>

<table>
    <tr>
        <th>id</th>
        <th>alvara_id</th>
        <th>nome</th>
        <th>arquivo</th>
        <th>vategoria</th>
        <th>opcao</th>
    </tr>
    <?php 
    $sql = "SELECT * FROM anexo_alvara ";
    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);
    if(mysqli_num_rows($result)==0){

    }else{
      while(list($id, $alvara_id, $nome, $arquivo, $categoria ) = mysqli_fetch_array($result)){ 

        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $alvara_id; ?></td>
            <td><?php echo $nome; ?></td>
            <td><?php echo $arquivo; ?></td>
            <td><?php echo $categoria; ?></td>
            <td><a href="upload\<?php echo $arquivo; ?>" download>Dowaload</a></td>
        </tr>
        <?php
    }
}
?>

</table>
<br>
<table>
    <tr>
        <th>id</th>
        <th>alvara_id</th>
        <th>nome</th>
        <th>arquivo</th>
        <th>vategoria</th>
        <th>opcao</th>
    </tr>
    <?php 
    $sql = "SELECT * FROM anexo_bombeiro ";
    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);
    if(mysqli_num_rows($result)==0){

    }else{
      while(list($id, $bombeiro_id, $nome, $arquivo, $categoria ) = mysqli_fetch_array($result)){ 

        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $bombeiro_id; ?></td>
            <td><?php echo $nome; ?></td>
            <td><?php echo $arquivo; ?></td>
            <td><?php echo $categoria; ?></td>
            <td><a href="upload\<?php echo $arquivo; ?>" download>Dowaload</a></td>
        </tr>
        <?php
    }
}
?>

</table>


