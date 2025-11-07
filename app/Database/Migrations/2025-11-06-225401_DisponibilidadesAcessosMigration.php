<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DisponibilidadesAcessosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "nivel_acesso_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "recurso_id"=>[
                "type"=>"int",
                "unsigned"=>true,
            ],
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->addUniqueKey(["nivel_acesso_id","recurso_id"],"uniqueK_nivel_acesso_and_recurso");
        $this->forge->addForeignKey("nivel_acesso_id","niveis_acessos","id","cascade","restrict","fk_nivel_acesso_has_disponibilidade_acesso");
        $this->forge->addForeignKey("recurso_id","recursos","id","cascade","restrict","fk_recurso_has_disponibilidade_acesso");
        $this->forge->createTable("disponibilidades_acessos",true,["engine"=>"InnoDB"]);   
    }

    public function down()
    {
        $this->forge->dropForeignKey("disponibilidades_acessos","fk_nivel_acesso_has_disponibilidade_acesso");
        $this->forge->dropForeignKey("disponibilidades_acessos","restrict","fk_recurso_has_disponibilidade_acesso");
        $this->forge->dropTable("disponibilidades_acessos",true);
    }
}
