<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EstadosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "pais_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "nome"=>[
                "type"=>"varchar",
                "constraint"=>50
            ],
            "sigla"=>[
                "type"=>"varchar",
                "constraint"=>50
            ]
            ]);
            $this->forge->addPrimaryKey("id");
            $this->forge->createTable("estados",true,["engine"=>"InnoDB"]);
            $this->forge->addForeignKey("pais_id","paises","id","cascade","restrict","fk_pais_has_estado");
    }

    public function down()
    {
        $this->forge->dropForeignKey("estados","fk_pais_has_estado");
        $this->forge->dropTable("estados",false);
    }
}
