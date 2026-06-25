<?php

namespace App\DB;

use \PDO;
use PDOException;
use PDOStatement;

class Database
{


    /** 
     * 
     * @var string
     */
    const HOST = '127.0.0.1';


    /** 
     * 
     * @var string
     */

    const NAME = 'locafast';


    /** 
     * 
     * @var string
     */

    const USER = 'root';


    /** 
     * 
     * @var string
     */

    const PASS = '';


    /** 
     * 
     * @var string
     */
    private $table;


    /** 
     * 
     * @var PDO
     */
    private $connection;


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @param string $table
     */

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\    

    /** 
     * 
     * 
     */

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR:' . $e->getMessage());
        }
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** * @param $query
     * @param array $params
     * @return PDOStatement
     */

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            error_log($e->getMessage());

            echo "<script>
                    alert('Erro ao realizar a operação no banco de dados.');
                    window.history.back();
                  </script>";
            exit;
        }
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     *  @param array $values [field => value]
     *  @return integer
     */

    public function insert($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT ' . $this->table . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        // EXECUTA O INSERT
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * @param string $where
     *  @param array $values [field => value]
     *  @return boolean
     */

    public function update($where, $values)
    {

        //DADOS DA QUERY
        $fields = array_keys($values);


        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        print("<script>console.log('$query')</script>");

        // EXECUTA O UPDATE
        $this->execute($query, array_values($values));

        return true;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * @param string $where
     * @return boolean
     */
    public function delete($where)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;

        try {
            // CORRIGIDO: Apenas uma execução, agora protegida dentro do try
            $this->execute($query);

            echo 'Excluído com sucesso!';
            return true; // Retorna true se a exclusão deu certo

        } catch (\PDOException $e) {
            // O PDO captura a exceção e guarda os detalhes no errorInfo
            $errorCode = $e->errorInfo[1] ?? null;

            if ($errorCode === 1451) {
                echo 'Erro ao Excluir, essa informação Está Ligada a Outra';
            } else {
                // Exibe qualquer outro erro genérico do banco
                echo 'Erro no banco de dados: ' . $e->getMessage();
            }

            return false; // Retorna false se houve falha na exclusão
        }
    }


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {

        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';


        $query = ' SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        print("<script>console.log('$query')</script>");

        return $this->execute($query);
    }
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\