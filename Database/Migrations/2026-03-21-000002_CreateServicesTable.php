<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicesTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'            => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => false],
            'slug'            => ['type' => 'VARCHAR', 'constraint' => 160, 'null' => false],
            'category'        => [
                'type'       => 'ENUM',
                'constraint' => [
                    'streaming_video', 'streaming_music', 'gaming_console',
                    'gaming_mobile', 'software', 'ai', 'cloud_storage',
                    'shopping', 'health_fitness', 'news_education',
                    'transport', 'other',
                ],
                'null' => false,
                'default' => 'other',
            ],
            'logo_url'        => ['type' => 'VARCHAR', 'constraint' => 300, 'null' => true, 'default' => null],
            'website_url'     => ['type' => 'VARCHAR', 'constraint' => 300, 'null' => true, 'default' => null],
            'description'     => ['type' => 'TEXT', 'null' => true, 'default' => null],
            'verified'        => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 0],
            'added_by_user_id'=> ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'default' => null],
            'active'          => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 1],
            'created_at'      => ['type' => 'DATETIME', 'null' => false],
            'updated_at'      => ['type' => 'DATETIME', 'null' => false],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('slug');
        $this->forge->addKey('category');
        $this->forge->addKey('verified');
        $this->forge->addKey('active');

        $this->forge->createTable('services');
    }

    public function down(): void
    {
        $this->forge->dropTable('services');
    }
}
