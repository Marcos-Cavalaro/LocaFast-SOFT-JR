<?php

namespace App\Entity;

use \App\DB\Database;
use \PDO;

class historico_manutencao
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
     * @var integer
     */

    public $id_veiculo;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var string
     */

    public $data_manutencao;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var string
     */

    public $descricao;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var boolean
     */

    public $status;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function cadastrarHistoricos()
    {

        // DEFINIR A DATA
        $this->data_manutencao= date('Y-m-d');

        // INSERIR A VAGA NO BANCO
        $obDatabase = new Database('historico_manutencao');


        // ATRIBUIR O ID DA VAGA NA INSTANCIA
        $this->id = $obDatabase->insert([

            'id_veiculo' => $this->id_veiculo,
            'data_manutencao' => $this->data_manutencao,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);

        //RETORNAR SUCESSO
        return true;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function atualizarHistoricos()
    {
        return (new Database('historico_manutencao'))->update('id = ' . $this->id, [

            'id_veiculo' => $this->id_veiculo,
            'data_manutencao' => $this->data_manutencao,
            'descricao' => $this->descricao,
            'status' => $this->status,

        ]);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function excluirHistoricos()
    {
        return (new Database('historico_manutencao'))->delete('id = ' . $this->id,);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */

    public static function getHistoricos($where = null, $order = null, $limit = null)
    {
        return (new Database('historico_manutencao'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, SELF::class);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /**
     * @param integer $id
     * @return historico_manutencao
     */

    public static function getHistorico($id)
    {
        return (new Database('historico_manutencao'))->select('id =' . $id)
            ->fetchObject(self::class);
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

}
