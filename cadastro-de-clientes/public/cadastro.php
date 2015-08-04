<?php

require_once __DIR__.'/autoload.php';

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
                <form method="post" action="fixtures.php" role="form">
                    <input type="hidden" name="cadastra" value="1">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <div class="radio">
                            <label><input type="radio" name="tipo" value="PF">Pessoa Fisíca</label>
                            <label><input type="radio" name="tipo" value="PJ">Pessoa Juridica</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" class="form-control" id="cpf">
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" id="endereco">
                    </div>
                    <div class="form-group">
                        <label for="enderecoCobranca">Endereço Cobrança:</label>
                        <input type="text" name="enderecoCobranca" class="form-control" id="enderecoCobranca">
                    </div>
                    <div class="form-group">
                        <label for="telefoe">Telefone:</label>
                        <input type="text" name="telefone" class="form-control" id="telefone">
                    </div>                    
                    <div class="form-group">
                        <label for="nota">Nota:</label>
                        <input type="number" max="5" min="0" value="0" name="nota" class="form-control" id="nota">
                    </div>
                    <button class="btn btn-lg btn-primary btn-ordenacao">Cadastrar</button>
                </form>
            </div>
        </div>
        <!--scripts e styles-->
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/utils.js"></script>
    </body>
</html>
