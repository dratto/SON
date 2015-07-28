<?php
namespace SON\DB;

use PDO;
/**
 * Description of DBConection
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */
class DBConection {
    
    private $pdo;
    private $cliente = [];
    private $tipos = [
        "fisica"   => ["cliente_pf","cpf"],
        "juridica" => ["cliente_pj","cnpj"]
    ];
    
    public function __construct(\PDO $pdo) { 
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function persist(\SON\Cliente\Cliente $cliente) {
        $this->cliente[] = $cliente;
    }
    public function flush() {
        try{
            foreach($this->cliente as $cliente) {
                $query = "INSERT INTO cliente 
                    (nm_cliente, endereco_cliente,endereco_cobranca_cliente,telefone,nota,tipo)
                    VALUES (:nome, :endereco, :endereco_cobranca, :telefone, :nota, :tipo)";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':nome', $cliente->getNome());
                $stmt->bindParam(':endereco', $cliente->getEndereco());
                $stmt->bindParam(':endereco_cobranca', $cliente->getEnderecoCobranca());
                $stmt->bindParam(':telefone', $cliente->getTelefone());
                $stmt->bindParam(':nota', $cliente->getNota());
                $stmt->bindParam(':tipo', $cliente->getTipo());
                $stmt->execute();
                $lastId = $this->pdo->lastInsertId();
                $this->insertClienteTipo($lastId, $cliente);
            }
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage;
        }
    }
    private function insertClienteTipo($id, $cliente) {
        $dados = $this->tipos[$cliente->getTipo()];
        $query = "INSERT INTO {$dados[0]} SET
                {$dados[1]} = :codigo_valor,
                id_cliente = :last_id";
        $stmt = $this->pdo->prepare($query);        
        $stmt->bindParam(":codigo_valor", $cliente->getCodigo());
        $stmt->bindParam(":last_id", $id);
        $stmt->execute();  
    }
    public function getClientes($ordenacao) {
        $query = "SELECT * FROM cliente as cli
                  LEFT JOIN cliente_pf as pf ON
                  cli.id_cliente = pf.id_cliente
                  LEFT JOIN cliente_pj as pj ON
                  cli.id_cliente = pj.id_cliente
                  ORDER BY  nm_cliente {$ordenacao}";
        return $this->pdo->query($query);       
    }
    
}
