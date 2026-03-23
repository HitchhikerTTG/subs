<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserSubscriptionsTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'plan_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'default' => null],
            'custom_name'   => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true, 'default' => null],
            'custom_price'  => ['type' => 'DECIMAL', 'constraint' => '8,2', 'null' => true, 'default' => null],
            'billing_cycle' => [
                'type'       => 'ENUM',
                'constraint' => ['monthly', 'yearly', 'one_time', 'included'],
                'null'       => true,
                'default'    => null,
            ],
            'status'        => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'trial', 'occasional', 'cancelled'],
                'null'       => false,
                'default'    => 'active',
            ],
            'started_at'    => ['type' => 'DATE', 'null' => true, 'default' => null],
            'created_at'    => ['type' => 'DATETIME', 'null' => false],
            'updated_at'    => ['type' => 'DATETIME', 'null' => false],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('user_id');
        $this->forge->addKey('plan_id');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('plan_id', 'service_plans', 'id', 'CASCADE', 'SET NULL');

        $this->forge->createTable('user_subscriptions');
    }

    public function down(): void
    {
        $this->forge->dropTable('user_subscriptions');
    }
}
