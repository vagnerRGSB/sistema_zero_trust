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
            "log_registro_id" => [
                "type" => "bigint",
                "unsigned" => true
            ],
            "nome_campo" => [
                "type" => "varchar",
                "constraint" => 60
            ],
            "dado_campo" => [
                "type" => "varchar",
                "constraint" => 60
            ],
            "log_atividade_anterior_id" => [
                "type" => "bigint",
                "unsigned" => true
            ]
        ]);

        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("logs_atividades", true, ["engine" => "InnoDB"]);
        $this->forge->addForeignKey(
            "log_registro_id",
            "logs_registros",
            "id",
            "cascade",
            "restrict",
            "fk_log_registro_has_log_atividade"
        );
        $this->forge->addForeignKey(
            "log_atividade_anterior_id",
            "logs_atividades",
            "id",
            "cascade",
            "restrict",
            "fk_log_atividade_anterior_has_log_atividade"
        );
    }

    public function down()
    {
        $this->forge->dropForeignKey("logs_atividades", "fk_log_registro_has_log_atividade");
        $this->forge->dropForeignKey("logs_atividades", "fk_log_atividade_anterior_has_log_atividade");
        $this->forge->dropTable("logs_atividades", true);
    }
}
