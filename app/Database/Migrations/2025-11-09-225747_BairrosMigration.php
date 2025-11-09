<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BairrosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "cidade_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "nome"=>[
                "type"=>"varchar",
                "constraint"=>60
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("bairros",true,["engine"=>"InnoDB"]);
        $this->forge->addForeignKey("cidade_id","cidades","id","cascade","restrict","fk_cidade_has_bairro");
    }

    public function down()
    {
        $this->forge->dropForeignKey("bairros","restrict","fk_cidade_has_bairro");
        $this->forge->dropTable("bairros",true);
    }
}
