<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CredenciaisEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['criado_em', 'atualizado_em', 'deletado_em'];
    protected $casts   = [];

    public function setSenha(string $senha_texto){
        return $this->attributes["senha"] = password_hash($senha_texto, PASSWORD_BCRYPT);
    }

    public function verificarSenha(string $senha):bool{
        return password_verify($senha, $this->attributes["senha"]);
    }

    
}
