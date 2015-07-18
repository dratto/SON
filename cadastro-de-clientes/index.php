<?php

require_once __DIR__.'/Cliente.php';

$ordenacao_vl = ($_POST["ordenacao"] == "ascendente") ? "descendente" : "ascendente" ; 


$clientes = [
        new Cliente("Carlos","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448"),
        new Cliente("Salma","067.175.889-13","Rua Opala, 23","99755-0965"),
        new Cliente("Jonas","067.175.889-13","Rua Anita Costa, 395","94508-2508"),
        new Cliente("Maria","067.175.889-13","Rua Anita Costa, 395","94508-2508"),
        new Cliente("Antonio","067.175.889-13","Rua Anita Costa, 395","94508-2508"),
        new Cliente("Decio","067.175.889-13","Rua Anita Costa, 395","94508-2508"),
        new Cliente("Lucia","067.175.889-13","Rua Anita Costa, 395","94508-2508"),
        new Cliente("Vanderli","067.175.889-13","Rua Anita Costa, 395","94508-2508"),
        new Cliente("Daisy","067.175.889-13","Rua Anita Costa, 395","94508-2508"),
        new Cliente("Débora","067.175.889-13","Rua Anita Costa, 395","94508-2508")
];
if($ordenacao_vl == "ascendente") {
    sort($clientes);
} else {
    rsort($clientes);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de clientes | SON - POO</title>
        <link href="css/style.css" rel="stylesheet">        
    </head>
    <body>
        <div class="container">
            <div class="listagem">
                <h1>Listagem de clientes</h1> 
                <form method="post" action="">
                    <input type="hidden" name="ordenacao" value="<?php echo $ordenacao_vl ?>">
                    <button class="btn btn-lg btn-primary btn-ordenacao">Mudar ordenação</button>
                </form>
                <div class="col-sm-4 lista">
                    <ul class="list-group">                        
                        <?php
                            $html = "";
                            foreach($clientes as $cliente) {
                                $html.= "<li class='list-group-item cliente'>";
                                $html.= "<b>{$cliente->nome}</b>";
                                $html.= "<div class='info-cliente'>";
                                $html.= "   <p>";
                                $html.= "       <b>CPF:</b> {$cliente->cpf}<br>";
                                $html.= "       <b>Endereço:</b>{$cliente->endereco}<br>";
                                $html.= "       <b>Telefone:</b>{$cliente->telefone}";
                                $html.= "   <p>";
                                $html.= "</div>";
                            }
                            echo $html;
                        ?>
                    </ul>
                </div>
            </div>
        </div>                
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/utils.js"></script>
    </body>
</html>
