<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogsRegistrosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "bigint",
                "unsigned" => true,
                "auto_increment" => true
            ],
            "data_registro" => [
                "type" => "datetime",
                "default" => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
            ],
            "end_ip" => [
                "type" => "varchar",
                "constraint" => 60,
            ],
            "usuario_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "modulo_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "metodo_id" => [
                "type" => "int",
                "unsigned" => true
            ],
            "entidade_id" => [
                "type" => "int",
                "unsigned" => true
            ]
        ]);

        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("logs_registros",true,["engine"=>"InnoDB"]);
        $this->forge->addForeignKey("usuario_id","usuarios","id","cascade","restrict","fk_usuario_has_log_registro");
        $this->forge->addForeignKey("modulo_id","modulos","id","cascade","restrict","fk_modulo_has_log_registro");
        $this->forge->addForeignKey("metodo_id","metodos","id","cascade","restrict","fk_metodo_has_log_registro");
    }

    public function down()
    {
        $this->forge->dropForeignKey("logs_registros","fk_usuario_has_log_registro");
        $this->forge->dropForeignKey("logs_registros","fk_modulo_has_log_registro");
        $this->forge->dropForeignKey("logs_registros","fk_metodo_has_log_registro");
        $this->forge->dropTable("logs_registros",true);
    }
}
