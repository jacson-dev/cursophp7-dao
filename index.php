<?php

require_once("config.php");

//Carrega um usúario
//$root = new Usuario();
//$root->loadbyId(3);
//echo $root;

//Carregta uma lista de usúarios
//$lista = Usuario::getList();

//echo json_encode($lista);
//carrega uma lista de usuários buscado pelo login
//$search = Usuario::search("jo");

//echo json_encode($search);
//carrega um usuário usando o login e a senha

$usuario = new Usuario();
$usuario->login("root", "Jr1Is@c2");

echo $usuario;

?>