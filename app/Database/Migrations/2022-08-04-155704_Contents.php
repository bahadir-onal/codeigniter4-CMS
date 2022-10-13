<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'module' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'default'    => 'blog'
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'unique'     => true
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'keywords' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'thumbnail' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'gallery' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'views' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'comment' => [
                'type'       => 'ENUM',
                'constraint' => ['ACTIVE','PASSIVE'],
                'default'    => 'PASSIVE'
            ],
            'field' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'page_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'similar' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['ACTIVE','PASSIVE','PENDING'],
                'default'    => 'PENDING'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('contents');
    }

    public function down()
    {
        //
    }
}
