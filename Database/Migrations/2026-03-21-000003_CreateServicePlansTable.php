<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicePlansTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'service_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'price'         => ['type' => 'DECIMAL', 'constraint' => '8,2', 'null' => false],
            'billing_cycle' => [
                'type'       => 'ENUM',
                'constraint' => ['monthly', 'yearly', 'one_time', 'included'],
                'null'       => false,
                'default'    => 'monthly',
            ],
            'description'   => ['type' => 'VARCHAR', 'constraint' => 300, 'null' => true, 'default' => null],
            'sort_order'    => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true, 'null' => false, 'default' => 0],
            'active'        => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 1],
            'created_at'    => ['type' => 'DATETIME', 'null' => false],
            'updated_at'    => ['type' => 'DATETIME', 'null' => false],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('service_id');
        $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('service_plans');
    }

    public function down(): void
    {
        $this->forge->dropTable('service_plans');
    }
}
