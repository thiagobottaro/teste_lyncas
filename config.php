<?php
//******************************************************/
// DEFINICAO BANCO MYSQL
//******************************************************/
define(DBNAME,'teste_lyncas');
define(DBHOST ,'localhost');	 // 
define(DBUSER ,'root');		 // USUARIO DO BANCO DE DADOS
define(DBSENHA,'');	         // SENHA DO BANCO DE DADOS
define(DBDSN,'mysql:host='.DBHOST.';dbname='.DBNAME.'');

//conecta e carrega parametros
include('db/conexao.php');
include('db/db.php');

global $pdo;
$con = new conexao();
$db = new Db();


?>