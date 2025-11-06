<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecursosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=>"int",
                "unsigned"=>true,
                "auto_increment"=>true
            ],
            "modulo_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "metodo_id"=>[
                "type"=>"int",
                "unsigned"=>true
            ],
            "url_rota"=>[
                "type"=>"varchar",
                "constraint"=>50,
            ]
            ]);
            $this->forge->addPrimaryKey("id");
            $this->forge->createTable("recursos",true,["engine"=>"InnoDB"]);
            $this->forge->addForeignKey("modulo_id","modulos","id","cascade","restrict","fk_modulo_has_recurso");
            $this->forge->addForeignKey("metodo_id","metodos","id","cascade","restrict","fk_metodo_has_recurso");
    }

    public function down()
    {
        $this->forge->dropForeignKey("recursos","fk_modulo_has_recurso");
        $this->forge->dropForeignKey("recursos","fk_metodo_has_recurso");
        $this->forge->dropTable("recursos",true);
    }
}
