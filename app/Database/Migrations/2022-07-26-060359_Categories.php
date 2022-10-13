<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
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
            'module' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'blog'
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null'   => false,
                'unique' => true
            ],
            'title' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'keywords' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['ACTIVE','PASSIVE'],
                'default'    => 'ACTIVE'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');
    }

    public function down()
    {

    }
}
