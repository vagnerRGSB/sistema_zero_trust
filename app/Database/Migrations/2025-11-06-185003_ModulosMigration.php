<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModulosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                "id"=>[
                    "type"=>"int",
                    "usigned"=>true,
                    "auto_increment"=>true
                ],
                "nome"=>[
                    "type"=>"varchar",
                    "constraint"=>50
                ]
                
            ]
                );
                $this->forge->addPrimaryKey("id");
                $this->forge->createTable("modulos",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("modulos",true);
    }
}
