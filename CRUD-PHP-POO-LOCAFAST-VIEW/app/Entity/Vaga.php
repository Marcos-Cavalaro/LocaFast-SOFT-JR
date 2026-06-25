<?php

namespace App\Entity;

use \App\DB\Database;
use \PDO;

class Vaga
{

    /** 
     * 
     * @var integer
     */

    public $id_vaga;

    /** 
     * 
     * @var string
     */

    public $Titulo;

    /** 
     * 
     * @var string
     */

    public $Descricao;

    /** 
     * 
     * @var string(Sim/Nao)
     */
    public $Ativo;

    /** 
     * 
     * @var string
     */
    public $Data;

    /** 
     * 
     * @return boolean 
     */

    public function cadastrar()
    {
        // DEFINIR A DATA

        $this->Data = date('Y-m-d H:i:s');


        // INSERIR A VAGA NO BANCO
        $obDatabase = new Database('vagas');

        // ATRIBUIR O ID DA VAGA NA INSTANCIA
        $this->id_vaga = $obDatabase->insert([
            'Titulo' => $this->Titulo,
            'Descricao' => $this->Descricao,
            'Ativo' => $this->Ativo,
            'Data' => $this->Data

        ]);

        //RETORNAR SUCESSO
        return true;
    }

    /** 
     * 
     * @return boolean 
     */
    public function atualizar()
    {
        return (new Database('vagas'))->update('id_vaga = ' . $this->id_vaga, [

            'Titulo' => $this->Titulo,
            'Descricao' => $this->Descricao,
            'Ativo' => $this->Ativo,
            'Data' => $this->Data

        ]);
    }

    /** 
     * 
     * @return boolean 
     */
    public function excluir() {
        return (new Database('vagas'))->delete('id_vaga = ' .$this->id_vaga,);

    }







    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */

    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new Database('vagas'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, SELF::class);
    }

    /**
     * @param integer $id_vaga
     * @return Vaga
     */

    public static function getVaga($id_vaga)
    {
        return (new Database('vagas'))->select('id_vaga =' . $id_vaga)
            ->fetchObject(self::class);
    }
}
