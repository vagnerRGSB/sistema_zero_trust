<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnderecosCepsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "int",
                "unsigned" => true,
                "auto_increment" => true
            ],
            "cep" => [
                "type" => "varchar",
                "constraint" => 8
            ],
            "cidade_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "bairro_id" => [
                "type" => "int",
                "unsigned" => true,
                "null" => true
            ],
            "nome_logradouro_id" => [
                "type" => "int",
                "unsigned" => true,
                "null" => true
            ]
        ]);
        $this->forge->addField("id");
        $this->forge->createTable("enderecos_ceps", true, ["engine" => "InnoDB"]);
        $this->forge->addForeignKey(
            "cidade_id",
            "cidades",
            "id",
            "cascade",
            "restrict",
            "fk_cidade_has_endereco_cep"
        );
        $this->forge->addForeignKey(
            "bairro_id",
            "bairros",
            "id",
            "cascade",
            "restrict",
            "fk_bairro_has_endereco_cep"
        );
        $this->forge->addForeignKey(
            "nome_logradouro_id",
            "nomes_logradouros",
            "id",
            "cascade",
            "restrict",
            "fk_nome_logradouro_has_endereco_cep"
        );
    }

    public function down()
    {
        $this->forge->dropForeignKey("enderecos_ceps","fk_cidade_has_endereco_cep");
        $this->forge->dropForeignKey("enderecos_ceps","fk_bairro_has_endereco_cep");
        $this->forge->dropForeignKey("enderecos_ceps","fk_nome_logradouro_has_endereco_cep");
        $this->forge->dropTable("enderecos_ceps",true);
    }
}
