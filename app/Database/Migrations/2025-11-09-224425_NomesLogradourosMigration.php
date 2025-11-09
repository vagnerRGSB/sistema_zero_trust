<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NomesLogradourosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "tipo_logradouro_id"=>[
                "type"=>"int",
                "unsigned"=>true,
            ],
            "nome"=>[
                "type"=>"varchar",
                "constraint"=>60
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("nomes_logradouros",true,["engine"=>"InnoDB"]);
        $this->forge->addForeignKey("tipo_logradouro_id","tipos_logradouros","id","cascade","restrict","fk_tipo_logradouro_has_nome_logradouro");
    }

    public function down()
    {
        $this->forge->dropForeignKey("nomes_logradouros","fk_tipo_logradouro_has_nome_logradouro");
        $this->forge->dropTable("nomes_logradouros",true);
    }
}
