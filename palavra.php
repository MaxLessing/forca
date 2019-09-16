<?php
    
    include_once "header.php";

    include_once "Db.php";

    $db = new Db();

    $db->query("select * from tb_categoria");

    $array = $db->getArray();

?>

<form method="post">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Selecione a categoria</label>
    <select class="form-control" id="categoria" name="categoria">
      <?php foreach($array as $a): ?>
        <option value="<?= $a['id_categoria'] ?>"><?= $a['categoria'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Palavra</label>
    <input type="text" class="form-control" id="palavra" aria-describedby="palavra" placeholder="digite sua palavra" name="palavra">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
    
    include_once "footer.php";

    if(isset($_POST) && $_POST) {

        $db->query("select * from tb_palavra where upper(palavra) = upper('{$_POST['palavra']}')");

        if($db->getFirst() != null) {
            echo "<script>";
            echo "bootbox.alert('Erro ao cadastrar palavra, já existente');";
            echo "</script>";
        } else {
            $db->query("INSERT INTO tb_palavra (palavra, id_categoria) values ('{$_POST['palavra']}', '{$_POST['categoria']}')");
            echo "<script>";
            echo "bootbox.alert('Sucesso ao cadastrar palavra, já existente');";
            echo "</script>";
        }
    }
?>