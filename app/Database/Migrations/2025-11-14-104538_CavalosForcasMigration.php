<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CavalosForcasMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "potencia"=>[
                "type"=>"float",
                "unsigned"=>true
            ]
            ]);
            $this->forge->addPrimaryKey("id");
            $this->forge->createTable("cavalos_forcas",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("cavalos_forcas",true);
    }
}
