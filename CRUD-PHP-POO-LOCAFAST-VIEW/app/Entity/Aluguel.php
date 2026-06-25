<?php

namespace App\Entity;

use \App\DB\Database;
use \PDO;

use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Mailtrap\Mime\MailtrapEmail;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Mime\Address;

class aluguel
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

    public $id_cliente;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var string
     */

    public $data_retirada;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @var string
     */

    public $data_devolucao;

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

    public $valor_locacao;

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

    public $categoria;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function cadastrarAlugueis()
    {

        // INSERIR A VAGA NO BANCO
        $obDatabase = new Database('aluguel');


        // ATRIBUIR O ID DA VAGA NA INSTANCIA
        $this->id = $obDatabase->insert([

            'id_cliente' => $this->id_cliente,
            'data_retirada' => $this->data_retirada,
            'data_devolucao' => $this->data_devolucao,
            'status' => $this->status,
            'valor_locacao' => $this->valor_locacao,
            'id_veiculo' => $this->id_veiculo,
            'categoria' => $this->categoria,

        ]);

        //RETORNAR SUCESSO
        return true;
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function atualizarAlugueis()
    {
        return (new Database('aluguel'))->update('id = ' . $this->id, [

            'id_cliente' => $this->id_cliente,
            'data_retirada' => $this->data_retirada,
            'data_devolucao' => $this->data_devolucao,
            'status' => $this->status,
            'valor_locacao' => $this->valor_locacao,
            'id_veiculo' => $this->id_veiculo,
            'categoria' => $this->categoria,

        ]);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /** 
     * 
     * @return boolean 
     */

    public function excluirAlugueis()
    {
        return (new Database('aluguel'))->delete('id = ' . $this->id,);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */

    public static function getAlugueis($where = null, $order = null, $limit = null)
    {
        return (new Database('aluguel'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, SELF::class);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

    /**
     * @param integer $id
     * @return aluguel
     */

    public static function getAluguel($id)
    {
        return (new Database('aluguel'))->select('id =' . $id)
            ->fetchObject(self::class);
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\


    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\



}