<?php

/**
 * Description of PessoaJuridica
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */
class PessoaJuridica extends Cliente {
        
    private $cnpj;
    
    public function __construct($nome, $cnpj, $endereco, $telefone, $nota, $enderecoCobranca = null) {
        $this->setNome($nome)
             ->setEndereco($endereco)
             ->setNota($nota)
             ->setTelefone($telefone)
             ->setTipo("juridica")
             ->setEnderecoCobranca($enderecoCobranca);
        $this->cnpj = $cnpj;
    }
    public function getCnpj() {
        return $this->cnpj;
    }
    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }
}
