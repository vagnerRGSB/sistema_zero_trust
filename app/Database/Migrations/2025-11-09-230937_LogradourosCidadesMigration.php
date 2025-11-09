<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogradourosCidadesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "int",
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nome_logradouro_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "cidade_id" => [
                "type" => "int",
                "unsigned" => true
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("logradouros_cidades",true,["engine"=>"InnoDB"]);
        $this->forge->addForeignKey("nome_logradouro_id","nomes_logradouros","id","cascade","restrict","fk_nome_logradouro_has_logradouro_cidade");
        $this->forge->addForeignKey("cidade_id","cidades","id","cascade","restrict","fk_cidade_has_logradouro_cidade");
    }

    public function down()
    {
        $this->forge->dropForeignKey("logradouros_cidades","fk_nome_logradouro_has_logradouro_cidade");
        $this->forge->dropForeignKey("logradouros_cidades","fk_cidade_has_logradouro_cidade");
        $this->forge->dropTable("logradouros_cidades",true);
    }
}
