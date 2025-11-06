<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NiveisAcessoMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "int",
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 50,
            ],
            "permite_acesso" => [
                "type" => "tinyint",
                "constraint" => 1,
                "default" => 1
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("niveis_acessos",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("niveis_acessos",true);
    }
}
