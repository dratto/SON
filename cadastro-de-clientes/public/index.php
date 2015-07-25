<?php
define('CLASS_DIR', __DIR__ . '/../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
function my_autoload ($pClassName) {
    require_once CLASS_DIR . str_replace("\\", "/", $pClassName) . ".php";
}
spl_autoload_register("my_autoload");

$ordenacao = ($_POST["ordenacao"] == "ASC") ? "DESC" : "ASC" ; 

$cliente = new SON\Cliente\Types\PessoaJuridica("Carlos","065.485.999-78","Rua Pereira Coutinho, 627","99234-9448", 5);
$db = new SON\DB\DBConection();
$db->persist($cliente);
$db->flush();

$clientes = $db->getClientes($ordenacao);
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
                <?php if($clientes  instanceof PDOStatement): ?>
                <div class="col-sm-4 lista">
                    <ul class="list-group">                        
                        <?php
                            $html = "";
                            while($cliente = $clientes->fetch(PDO::FETCH_ASSOC)) {
                                $tipo = $cliente["tipo"];
                                $html.= "<li class='list-group-item cliente'>";
                                $html.= "<b>{$cliente["nm_cliente"]}</b>";
                                $html.= "<i>Pessoa {$tipo}</i>";
                                $html.= "<span class='stars stars-{$cliente["nota"]}'></span>";
                                $html.= "<div class='info-cliente'>";
                                $html.= "   <p>";
                                if($tipo == "fisica") {
                                    $html.= "       <b>CPF:</b> {$cliente["cpf"]}<br>";
                                } else {
                                    $html.= "       <b>CNPJ:</b> {$cliente["cnpj"]}<br>";
                                }
                                $html.= "       <b>Endereço:</b>{$cliente["endereco_cliente"]}<br>";
                                $html.= "       <b>Telefone:</b>{$cliente["telefone"]}<br>";
                                if($cliente["endereco_cobranca_cliente"] != null) {
                                    $html.= "<b>Endereço para cobrança:</b>{$cliente["endereco_cobranca_cliente"]}";
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
