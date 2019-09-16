<?php

include_once "Db.php";

$db = new Db();

$sql = "select * from tb_palavra";

if (isset($_GET["selected_category"]) && $_GET["selected_category"]) {
    $sql .= " where id_categoria = " . $_GET["selected_category"];
}

$db->query($sql);

$array_words = [];

foreach ($db->getArray() as $pal) {
    $array_words[] = $pal["palavra"];
}

$word = $array_words[rand(0, (count($array_words) - 1))];

echo json_encode(["ok" => true, "word" => $word]);
die();