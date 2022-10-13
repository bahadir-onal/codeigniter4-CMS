<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Languages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
                'null' => false,
                'unique' => true
            ],
            'flag' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
                'null' => false,
            ],
            'title' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['ACTIVE','PASSIVE'],
                'default'    => 'PASSIVE'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('languages');
    }

    public function down()
    {
        //
    }
}
