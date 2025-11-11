<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CredenciaisMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "usigned"=>true,
                "auto_increment"=>true
            ],
            "usuario_id"=>[
                "type"=>"int",
                "usigned"=>true
            ],
            "email"=>[
                "type"=>"varchar",
                "constraint"=>50,
                "unique"=>true,
                "index"=>true
            ],
            "senha"=>[
                "type"=>"varchar",
                "constraint"=>90
            ]
            ]);
            $this->forge->addPrimaryKey("id");
            $this->forge->createTable("credenciais",true,["engine"=>"InnoDB"]);
            $this->forge->addForeignKey("usuario_id","usuarios","id","cascade","restrict","fk_usuario_has_credenciais");
    }

    public function down()
    {
        $this->forge->dropForeignKey("credenciais","restrict","fk_usuario_has_credenciais");
        $this->forge->dropTable("credenciais",true);
    }
}
