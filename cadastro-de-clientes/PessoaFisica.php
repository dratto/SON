<?php

/**
 * Description of PessoaFisica
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */
class PessoaFisica extends Cliente implements PFInterface {
    
    private $cpf;   
    
    public function __construct($nome, $cpf, $endereco, $telefone, $nota, $enderecoCobranca = null) {
        $this->setNome($nome)
             ->setEndereco($endereco)
             ->setNota($nota)
             ->setTelefone($telefone)
             ->setTipo("fisica")
             ->setEnderecoCobranca($enderecoCobranca);
        $this->cpf = $cpf;
    }
    public function getCPF() {
        return $this->cpf;        
    }
    public function setCPF($cpf) {
        $this->cpf = $cpf;
        return $this;
    }
}
