<?php

namespace app\models;
use DB;
abstract class Model
{
    public $name;
    public $fillable = array();

    public function __construct($nome){
        $this->name = $nome;
    }
    public  function create($dados){

        $sql = 'INSERT INTO '. $this->name .'([CAMPOS]) VALUES([VALUES])';
        $campos = implode(',',array_keys($dados));
        $valores = implode(',',array_values($dados));
        $sql = str_replace('[CAMPOS]',$campos, $sql);
        $sql = str_replace('[VALUES]', $valores,$sql);


        $DB = new DB();
        try{
            $DB->PDO->beginTransaction();
                $DB->PDO->query($sql);
            $DB->PDO->commit();
            return ['message' => 'Usuário cadastrado com sucesso', 'success' => true];
        }catch (\Exception $e){
            $DB->PDO->rollBack();
            return ['message' => 'Não foi possível cadastrar o usuário','erro' => $e->getMessage(), 'success' => false];
        }
    }

}