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
    private $cliente;
    private $tipos = [
        "fisica"   => ["cliente_pf","cpf",'getCpf'],
        "juridica" => ["cliente_pj","cnpj",'getCnpj']
    ];
    
    public function __construct() {
        $dsn  = "mysql:dbname=teste;host=127.0.0.1";
        $user = "root";
        $pass = "";        
        $this->pdo = new PDO($dsn,$user,$pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function persist(\SON\Cliente\Cliente $cliente) {
        $this->cliente = $cliente;
    }
    public function flush() {
        try{
            $query = "INSERT INTO cliente 
                (nm_cliente, endereco_cliente,endereco_cobranca_cliente,telefone,nota,tipo)
                VALUES (:nome, :endereco, :endereco_cobranca, :telefone, :nota, :tipo)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome', $this->cliente->getNome());
            $stmt->bindParam(':endereco', $this->cliente->getEndereco());
            $stmt->bindParam(':endereco_cobranca', $this->cliente->getEnderecoCobranca());
            $stmt->bindParam(':telefone', $this->cliente->getTelefone());
            $stmt->bindParam(':nota', $this->cliente->getNota());
            $stmt->bindParam(':tipo', $this->cliente->getTipo());
            $stmt->execute();
            $lastId = $this->pdo->lastInsertId();
            $this->insertClienteTipo($lastId);
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage;
        }
    }
    private function insertClienteTipo($id) {
        $dados = $this->tipos[$this->cliente->getTipo()];
        $query = "INSERT INTO {$dados[0]} SET
                {$dados[1]} = :codigo_valor,
                id_cliente = :last_id";
        $stmt = $this->pdo->prepare($query);        
        $stmt->bindParam(":codigo_valor", $this->cliente->getCodigo());
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
