<?php

include_once "Db.php";

$db = new Db();

$array_categories = [];

$db->query("select * from tb_categoria");

foreach ($db->getArray() as $cat) {
    $array_categories[] = [
        "text" => $cat["categoria"],
        "value" => $cat["id_categoria"],
    ];
}

echo json_encode(["ok" => true, "categories" => $array_categories]);
die();