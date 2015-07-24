<?php
define('CLASS_DIR', __DIR__ . '/../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
function my_autoload ($pClassName) {
    require_once CLASS_DIR . str_replace("\\", "/", $pClassName) . ".php";
}
spl_autoload_register("my_autoload");

$ordenacao_vl = ($_POST["ordenacao"] == "ascendente") ? "descendente" : "ascendente" ; 


$clientes = [
        new SON\Cliente\Types\PessoaFisica("Carlos","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 5),
        new SON\Cliente\Types\PessoaFisica("Salma","067.175.889-13","Rua Opala, 23","99755-0965",4, "Rua Pereira da Silva, 800"),
        new SON\Cliente\Types\PessoaFisica("Jonas","067.175.889-13","Rua Anita Costa, 395","94508-2508",3),
        new SON\Cliente\Types\PessoaFisica("Maria","067.175.889-13","Rua Anita Costa, 395","94508-2508",2),
        new SON\Cliente\Types\PessoaFisica("Antonio","067.175.889-13","Rua Anita Costa, 395","94508-2508",1),
        new SON\Cliente\Types\PessoaJuridica("Decio","067.175.889-13","Rua Anita Costa, 395","94508-2508",3, "Rua Jaqueline Montanha, 67"),
        new SON\Cliente\Types\PessoaJuridica("Lucia","067.175.889-13","Rua Anita Costa, 395","94508-2508",4),
        new SON\Cliente\Types\PessoaJuridica("Vanderli","067.175.889-13","Rua Anita Costa, 395","94508-2508",2, "Avenida Paulista, 105"),
        new SON\Cliente\Types\PessoaJuridica("Daisy","067.175.889-13","Rua Anita Costa, 395","94508-2508",1),
        new SON\Cliente\Types\PessoaJuridica("Débora","067.175.889-13","Rua Anita Costa, 395","94508-2508",5)
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
    </head>
    <body>          
        <div class="container">
            <div class="listagem">
                <h1>Listagem de clientes</h1> 
                <form method="post" action="">
                    <input type="hidden" name="ordenacao" value="<?php echo $ordenacao_vl ?>">
                    <button class="btn btn-lg btn-primary btn-ordenacao">Mudar ordenação</button>
                </form>
                <?php if(is_array($clientes)): ?>
                <div class="col-sm-4 lista">
                    <ul class="list-group">                        
                        <?php
                            $html = "";
                            foreach($clientes as $cliente) {
                                $tipo = $cliente->getTipo();
                                $html.= "<li class='list-group-item cliente'>";
                                $html.= "<b>{$cliente->getNome()}</b>";
                                $html.= "<i>Pessoa {$tipo}</i>";
                                $html.= "<span class='stars stars-{$cliente->getNota()}'></span>";
                                $html.= "<div class='info-cliente'>";
                                $html.= "   <p>";
                                if($tipo == "fisica") {
                                    $html.= "       <b>CPF:</b> {$cliente->getCpf()}<br>";
                                } else {
                                    $html.= "       <b>CNPJ:</b> {$cliente->getCnpj()}<br>";
                                }
                                $html.= "       <b>Endereço:</b>{$cliente->getEndereco()}<br>";
                                $html.= "       <b>Telefone:</b>{$cliente->getTelefone()}<br>";
                                if($cliente->getEnderecoCobranca() != null) {
                                    $html.= "<b>Endereço para cobrança:</b>{$cliente->getEnderecoCobranca()}";
                                }
                                $html.= "   </p>";
                                $html.= "</div>";
                            }
                            echo $html;
                        ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>                
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/utils.js"></script>
    </body>
</html>
