<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InicialExtructure extends Migration
{
    public function up()
    {    
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'equipamento' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true,
            ],
            'fabricante' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('equipamento');
        $this->forge->createTable('equipamentos');
    }

    public function down()
    {
        $this->forge->dropTable('equipamentos', true);
    }
}
