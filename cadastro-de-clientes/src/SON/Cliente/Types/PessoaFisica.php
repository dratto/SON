<?php

namespace SON\Cliente\Types;

use SON\Cliente\Cliente;
use SON\Cliente\Interfaces\PFInterface;
/**
 * Description of PessoaFisica
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */
class PessoaFisica extends Cliente implements PFInterface {
    
    private $cpf;   
    
    public function __construct($dados) {
        $this->setNome($dados["nome"])
             ->setEndereco($dados["endereco"])
             ->setNota($dados["nota"])
             ->setTelefone($dados["telefone"])
             ->setTipo("fisica")
             ->setEnderecoCobranca($dados["enderecoCobranca"]);
        $this->cpf = $dados["cpf"];
    }
    public function getCPF() {
        return $this->cpf;        
    }
    public function setCPF($cpf) {
        $this->cpf = $cpf;
        return $this;
    }
    public function getCodigo() {
        return $this->cpf;
    }
}
