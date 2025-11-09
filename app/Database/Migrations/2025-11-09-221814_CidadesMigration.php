<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CidadesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "nome"=>[
                "type"=>"varchar",
                "constraint"=>60
            ],
            "estado_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("cidades",true,["engine"=>"InnoDB"]);
        $this->forge->addForeignKey("estado_id","estados","id","cascade","restrict","fk_estado_has_cidade");
    }

    public function down()
    {
        $this->forge->dropForeignKey("cidades","fk_estado_has_cidade");
        $this->forge->dropTable("cidades",true);
    }
}
