<?php
    
    include_once "header.php";

?>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <input type="text" class="form-control" id="categoria" aria-describedby="categoria" placeholder="digite sua categoria" name="categoria">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
    
    include_once "footer.php";

    include_once "Db.php";

    $db = new Db();

    if(isset($_POST) && $_POST) {

        $db->query("select * from tb_categoria where upper(categoria) = upper('{$_POST['categoria']}')");

        if($db->getFirst() != null) {
            echo "<script>";
            echo "bootbox.alert('Erro ao cadastrar categoria, já existente');";
            echo "</script>";
        } else {
            $db->query("INSERT INTO tb_categoria (categoria) values ('{$_POST['categoria']}')");
            echo "<script>";
            echo "bootbox.alert('Sucesso ao cadastrar categoria');";
            echo "</script>";
        }
    }
?>