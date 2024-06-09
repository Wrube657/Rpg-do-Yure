<?php
include('conexao.php');

if(isset($_POST['jogador']) || isset($_POST['senha'])){
    if(strlen($_POST['jogador']) == 0){
        echo'preencha o seu nome';
    }else if(strlen($_POST['senha']) == 0){
        echo'preencha a sua senha';
    }else{
        $jogador = $mysqli->real_escape_string($_POST['jogador']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE nome_usuario = '$jogador' AND senha_usuario = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código sql".$mysqli->error);
    
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id_usuario'];
            $_SESSION['jogador'] = $usuario['nome_usuario'];
            $_SESSION['nome_personagem'] = $usuario['nome_personagem'];
            $_SESSION['itens'] = $usuario['itens_inventario'];
            $_SESSION['forca'] = $usuario['atributo_forca'];

            header("Location: ficha.php");

        }else{
            echo"Falha ao logar, email ou senha incorretos";
        }
    }
}
?>
