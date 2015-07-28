<?php

require_once __DIR__.'/autoload.php';


$pdo = new PDO("mysql:dbname=teste;host=localhost", "root", "");
$db  = new SON\DB\DBConection($pdo);
#Instância clientes
$cliente   = new SON\Cliente\Types\PessoaJuridica("Carlos","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 5);
$cliente2  = new SON\Cliente\Types\PessoaJuridica("Ana","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 3);
$cliente3  = new SON\Cliente\Types\PessoaJuridica("Rabino","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 4);
$cliente4  = new SON\Cliente\Types\PessoaJuridica("Carla","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 5);
$cliente5  = new SON\Cliente\Types\PessoaJuridica("Uenio","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 2);
$cliente6  = new SON\Cliente\Types\PessoaFisica("Vanderli","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 3);
$cliente7  = new SON\Cliente\Types\PessoaFisica("Diogo","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 1);
$cliente8  = new SON\Cliente\Types\PessoaFisica("Claire","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 2);
$cliente9  = new SON\Cliente\Types\PessoaFisica("Nathalia","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 3);
$cliente10 = new SON\Cliente\Types\PessoaFisica("Maisa","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 4,"Avenida Paulista, 1001");

#Armazena clientes em array
$db->persist($cliente);
$db->persist($cliente2);
$db->persist($cliente3);
$db->persist($cliente4);
$db->persist($cliente5);
$db->persist($cliente6);
$db->persist($cliente7);
$db->persist($cliente8);
$db->persist($cliente9);
$db->persist($cliente10);

$db->flush();