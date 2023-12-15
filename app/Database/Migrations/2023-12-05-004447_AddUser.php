<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddUser extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'auto_increment' => true
            ],
            'role' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'fullname'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
            'email' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 255,
            ],
            "password" => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
