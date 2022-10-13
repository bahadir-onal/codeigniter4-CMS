<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContentCategories extends Migration
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
            'content_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('content_categories');
    }

    public function down()
    {
        //
    }
}
