<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AutenticadorController extends BaseController
{

    public function __construct()
    {
        
    }
    public function SigIni()
    {
        
        return view("autenticacao/sigini");
    }

    public function acessLogin(){

    }
    public function logoutLogin(){

    }
}
