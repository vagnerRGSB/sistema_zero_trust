<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MarcasMigration extends Migration
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
            $this->forge->addField("id");
            $this->forge->createTable("marcas",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("marcas",true);
    }
}
