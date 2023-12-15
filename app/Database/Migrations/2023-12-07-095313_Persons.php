<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Persons extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'fisrtname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'account_num' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'address' => [  
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'profession' => [  
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nationality' => [  
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('persons');
    }

    public function down()
    {
        $this->forge->dropTable('persons');
    }
}
