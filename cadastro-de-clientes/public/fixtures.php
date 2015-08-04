<?php
require_once __DIR__.'/autoload.php';

function cadastra_cliente($dados) {
    $pdo = new PDO("mysql:dbname=teste;host=localhost", "root", "");
    $db  = new SON\DB\DBConection($pdo);
    #Instância clientes
    if($dados["tipo"] == "PF") {
        $cliente   = new SON\Cliente\Types\PessoaFisica($dados);
    }
    #Armazena clientes em array
    $db->persist($cliente);

    $db->flush();
    header("Location: index.php",200);
}

if($_POST['cadastra']) {
    cadastra_cliente($_POST);
}