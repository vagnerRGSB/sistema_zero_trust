<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsuariosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsignet"=>true,
                "auto_increment"=>true
            ],
            "nivel_acesso_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "nome"=>[
                "type"=>"varchar",
                "constraint"=>50,
            ],
            "sobre_nome"=>[
                "type"=>"varchar",
                "constraint"=>50
            ],
            "bloqueado_ate"=>[
                "type"=>"datetime",
                "null"=>true,
                "default"=>null
            ],
            "endereco_cep_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "numero"=>[
                "type"=>"int",
                "usigned"=>true
            ],
            "tipo_imovel_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "complemento"=>[
                "type"=>"varchar",
                "constraint"=>60
            ],
            "criado_em"=>[
                "type"=>"datetime",
                "null"=>true,
                "default"=>null
            ],
            "atualizado_em"=>[
                "type"=>"datetime",
                "null"=>true,
                "default"=>null
            ],
            "desabilitado_em"=>[
                "type"=>"datetime",
                "null"=>true,
                "default"=>null
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("usuarios",true,["engine"=>"InnoDB"]);
        $this->forge->addForeignKey("nivel_acesso_id","niveis_acessos","id","cascade","restrict","fk_nivel_acesso_has_usuario");
        $this->forge->addForeignKey("endereco_cep_id","enderecos_ceps","id","cascade","restrict","fk_endereco_cep_has_usuario");
        $this->forge->addForeignKey("tipo_imovel_id","tipos_imoveis","id","cascade","restrict","fk_tipo_imovel_has_usuario");

    }

    public function down()
    {
        $this->forge->dropForeignKey("usuarios","fk_nivel_acesso_has_usuario");
        $this->forge->dropForeignKey("usuarios","fk_endereco_cep_has_usuario");
        $this->forge->dropForeignKey("usuarios","fk_tipo_imovel_has_usuario");
        $this->forge->dropTable("usuarios",true);
    }
}
