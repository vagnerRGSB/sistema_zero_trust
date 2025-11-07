<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\MySQLi\Forge;

class PaisesMigration extends Migration
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
                "constraint"=>50
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("paises",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("paises",true);
    }
}
