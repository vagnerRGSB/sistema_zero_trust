<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TiposLogradourosMigration extends Migration
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
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("tipos_logradouros",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("tipos_logradouros",true);
    }
}
