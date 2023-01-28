<?php

namespace app\controller;

use DB;
use app\models\User;
class UserController extends Controller
{
    public function index()
    {
        $DB = new DB();
        $users = $DB->PDO->query('SELECT * FROM usuarios ')->fetchAll();
        Controller::view('User', [$users]);
    }

    private function validate($request)
    {
        $camposNaoInformados = array_filter((array)$request, function ($input) {
            return $input == '';
        });
        if (!empty($camposNaoInformados)) {
            $alerta = '<div style="margin: 10px" class="alert alert-warning d-flex justify-content-between align-content-center" role="alert"><div>';
            foreach (array_keys($camposNaoInformados) as $campos) {
                $campo = strtoupper($campos);
                $alerta .= "<span>Você não informou o campo {$campo}</span> <br> ";
            }
            $alerta .= '</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            self::index();
            echo $alerta;

        } else {
            return true;
        }
    }

    public function store($request)
    {
        if ($this->validate($request)) {
            $db = new DB();

            try {
                $db->PDO->beginTransaction();
                $a = new User('usuarios');
                $a->create(['data' => 1,'arr' => 3, 'a' => 55]);
                $db->PDO->commit();
            } catch (\Exception $e) {
                $db->PDO->rollback();

            }

        }
    }
}
