<?php

include_once "Db.php";

$db = new Db();

$db->query("INSERT INTO tb_jogo (jogo) values (' ')");

$id = $db->getInsertId();

echo json_encode([
    "id" => $id,
    "gameType" => "0",
    "selectedWord" => "",
    "selectedCategory" => "",
    "subMessage" => "",
    "scoreMessage" => "",
    "showingWord" => "",
    "selectedLetter" => "",
    "letterPoint" => 5,
    "wordPoint" => 100,
    "init" => false,
    "players" => [
        [
            "id" => null,
            "name" => 'Jogador 1',
            "lifes" => 5,
            "point" => 0,
            "init" => false,
            "score" => 0
        ],
        [
            "id" => null,
            "name" => 'Jogador 2',
            "lifes" => 5,
            "point" => 0,
            "init" => false,
            "score" => 0
        ],
    ],
    "playerTime" => "0",
    "letters" => [
        [
            "letter" => 'A',
            "enable" => true
        ],
        [
            "letter" => 'B',
            "enable" => true
        ],
        [
            "letter" => 'C',
            "enable" => true
        ],
        [
            "letter" => 'D',
            "enable" => true
        ],
        [
            "letter" => 'E',
            "enable" => true
        ],
        [
            "letter" => 'F',
            "enable" => true
        ],
        [
            "letter" => 'G',
            "enable" => true
        ],
        [
            "letter" => 'H',
            "enable" => true
        ],
        [
            "letter" => 'I',
            "enable" => true
        ],
        [
            "letter" => 'J',
            "enable" => true
        ],
        [
            "letter" => 'K',
            "enable" => true
        ],
        [
            "letter" => 'L',
            "enable" => true
        ],
        [
            "letter" => 'M',
            "enable" => true
        ],
        [
            "letter" => 'N',
            "enable" => true
        ],
        [
            "letter" => 'O',
            "enable" => true
        ],
        [
            "letter" => 'P',
            "enable" => true
        ],
        [
            "letter" => 'Q',
            "enable" => true
        ],
        [
            "letter" => 'R',
            "enable" => true
        ],
        [
            "letter" => 'S',
            "enable" => true
        ],
        [
            "letter" => 'T',
            "enable" => true
        ],
        [
            "letter" => 'U',
            "enable" => true
        ],
        [
            "letter" => 'V',
            "enable" => true
        ],
        [
            "letter" => 'W',
            "enable" => true
        ],
        [
            "letter" => 'X',
            "enable" => true
        ],
        [
            "letter" => 'Y',
            "enable" => true
        ],
        [
            "letter" => 'Z',
            "enable" => true
        ]
    ]]);
die();