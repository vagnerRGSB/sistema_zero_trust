<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MaquinariosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "int",
                "unsigned" => true,
                "auto_increment" => true
            ],
            "potencia_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "modelo_maquinario_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "categoria_maquinario_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "potencia_minima_id" => [
                "type" => "int",
                "unsigned" => true
            ]
        ]);
        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("maquinarios", true, ["engine" => "InnoDB"]);
        $this->forge->addForeignKey(
            "potencia_id",
            "cavalos_forcas",
            "id",
            "cascade",
            "restrict",
            "fk_potencia_has_maquinario"
        );
        $this->forge->addForeignKey(
            "modelo_maquinario_id",
            "modelos_maquinarios",
            "id",
            "cascade",
            "restrict",
            "fk_modelo_maquinario_has_maquinario"
        );
        $this->forge->addForeignKey(
            "categoria_maquinario_id",
            "categorias_maquinarios",
            "id",
            "cascade",
            "restrict",
            "fk_categoria_maquinario_has_maquinario"
        );
    }

    public function down()
    {
        $this->forge->dropForeignKey("maquinarios","fk_potencia_has_maquinario");
        $this->forge->dropForeignKey("maquinarios","fk_modelo_maquinario_has_maquinario");
        $this->forge->dropForeignKey("maquinarios","fk_categoria_maquinario_has_maquinario");
        $this->forge->dropTable("maquinarios",true);
    }
}
