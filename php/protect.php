<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["id"])){
    die("Você não esta logado, logo não pode acessar esta página.<p><a href=\"index.php\">Entrar</p>");
}