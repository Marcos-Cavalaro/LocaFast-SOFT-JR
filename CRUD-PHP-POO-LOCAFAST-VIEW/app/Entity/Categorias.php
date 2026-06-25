<?php

namespace App\Entity;

use \App\DB\Database;
use \PDO;

class categorias
{

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var integer
     */

    public $id;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var string
     */

    public $nome;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var boolean
     */

    public $status;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var float
     */

    public $valor;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function cadastrarCategorias()
    {

        // INSERIR A VAGA NO BANCO
        $obDatabase = new Database('categorias');


        // ATRIBUIR O ID DA VAGA NA INSTANCIA
        $this->id = $obDatabase->insert([

            'nome' => $this->nome,
            'status' => $this->status,
            'valor' => $this->valor,

        ]);

        //RETORNAR SUCESSO
        return true;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function atualizarCategorias()
    {
        return (new Database('categorias'))->update('id = ' . $this->id, [

            'nome' => $this->nome,
            'status' => $this->status,
            'valor' => $this->valor,

        ]);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function excluirCategorias()
    {
        return (new Database('categorias'))->delete('id = ' . $this->id,);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */

    public static function getCategorias($where = null, $order = null, $limit = null)
    {
        return (new Database('categorias'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, SELF::class);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /**
     * @param integer $id
     * @return categorias
     */

    public static function getCategoria($id)
    {
        return (new Database('categorias'))->select('id =' . $id)
            ->fetchObject(self::class);
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

}
