<?php

namespace SON\Cliente\Types;

use SON\Cliente\Cliente;
use SON\Cliente\Interfaces\PJInterface;
/**
 * Description of PessoaJuridica
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */
class PessoaJuridica extends Cliente implements PJInterface {
        
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
    public function getCNPJ() {
        return $this->cnpj;
    }
    public function setCNPJ($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }
}
