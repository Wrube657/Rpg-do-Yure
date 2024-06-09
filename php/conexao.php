<?php

$usuario = 'root';
$senha = '';
$db = 'rpg_cyberpunk_db';
$host = 'localhost';

$mysqli = new mysqli($host,$usuario,$senha,$db);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados: ".$mysqli->error);
}

$sql = "SELECT usuario.nome_usuario, personagem.nome_personagem, inventario.itens_inventario, combate.atributo_forca
        FROM usuario
        INNER JOIN personagem ON usuario.id_usuario = personagem.id_personagem
        LEFT JOIN inventario ON personagem.id_personagem = inventario.id_inventario
        LEFT JOIN combate ON personagem.id_personagem = combate.id_combate";

$result = $mysqli->query($sql);

