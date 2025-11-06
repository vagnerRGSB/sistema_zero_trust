<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MetodosMigration extends Migration
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
                "constraint"=>50,
            ],
            "icon"=>[
                "type"=>"varchar",
                "constraint"=>50,
                "null"=>true
            ],
            "tipo"=>[
                "type"=>"varchar",
                "constraint"=>5,
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("metodos",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("metodos",true);
    }
}
