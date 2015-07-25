<?php

namespace SON\Cliente;

use SON\Cliente\Interfaces\EnderecoCobrancaInterface;
use SON\Cliente\Interfaces\GrauImportanciaInterface;
/**
 * Description of Cliente
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 * 
 */
class Cliente implements EnderecoCobrancaInterface,  GrauImportanciaInterface {
    
    protected $nome;
    protected $endereco;
    protected $enderecoCobranca;
    protected $telefone;
    protected $nota;
    protected $tipo;

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }
    public function gettelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }
    public function getNota() {
        return $this->nota;
    }
    public function setNota($nota) {
        $this->nota = $nota;
        return $this;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }
    public function getEnderecoCobranca() {
        return $this->enderecoCobranca;
    }
    public function setEnderecoCobranca($enderecoCobranca = null) {
        $this->enderecoCobranca = $enderecoCobranca;
        return $this;
    }
}
