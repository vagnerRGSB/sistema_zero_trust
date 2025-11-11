<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CredenciaisModel;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Session;

class AutenticadorController extends BaseController
{
    private $usuario;
    private $credencial_usuario;

    public function __construct()
    {
        $this->usuario = new UsuarioModel();
        $this->credencial_usuario = new CredenciaisModel();
    }
    public function SigIni()
    {
        
        return view("autenticacao/sigini");
    }

    public function acessLogin(){
        $sessao = new Session();

        $regras = [
            "email" => "required|valid_email",
            "senha" => "required"
        ];
        if(!$this->validate($regras)){
            return redirect()->to("sigIni")->withInput()->with("errors",$this->validator->getErrors());
        }
        $email = $this->request->getPost("email");
        $senha = $this->request->getPost("senha");

        $credencial = $this->usuario->buscarEmailUsuario($email);
    }
    public function logoutLogin(){

    }
}
