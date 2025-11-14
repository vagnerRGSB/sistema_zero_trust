<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModelosMaquinariosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "marca_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "tipo_maquinario_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "nome"=>[
                "type"=>"varchar",
                "constraint"=>60
            ]
            ]);
            $this->forge->addPrimaryKey("id");
            $this->forge->createTable("modelos_maquinarios",true,["engine"=>"InnoDB"]);
            $this->forge->addForeignKey("marca_id","marcas","id","fk_marca_has_modelo_maquinario");
            $this->forge->addForeignKey("tipo_maquinario_id",
            "tipos_maquinarios",
            "id",
            "cascade","restrict",
            "fk_tipo_maquinario_has_modelo_maquinario");
    }

    public function down()
    {
        $this->forge->dropForeignKey("modelos_maquinarios","fk_marca_has_modelo_maquinario");
        $this->forge->dropForeignKey("modelos_maquinarios","fk_tipo_maquinario_has_modelo_maquinario");
        $this->forge->dropTable("modelos_maquinarios",true);
    }
}
