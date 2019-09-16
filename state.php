<?php

include_once "Db.php";

$db = new Db();

if ($_POST) {

    if (isset($_POST['players'])) {
        for ($i = 0; $i < count($_POST['players']); $i++) {
            $player = $_POST['players'][$i];

            if ($player["init"] == "true") {

                $point = (int)$player["point"];

                if ($player["id"]) {
                    $db->query("UPDATE tb_jogador SET nome = '{$player["name"]}', pontuacao = {$point} WHERE id_jogador = {$player["id"]}");
                } else {
                    $db->query("INSERT INTO tb_jogador (nome, pontuacao, id_jogo) values ('{$player["name"]}', {$point}, {$_POST["id"]})");
                    $player["id"] = $db->getInsertId();
                }
            }

            $_POST['players'][$i] = $player;
        }
    }

    $json = json_encode($_POST);

    $db->queryBind("UPDATE tb_jogo set jogo = ? where id_jogo = {$_POST['id']}", [$json]);

    echo $json;
} else {

    $db->query("select * from tb_jogo where id_jogo = {$_REQUEST['id']}");

    echo $db->getFirst()["jogo"];

    //echo file_get_contents("state.json");
}