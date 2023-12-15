<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Folders extends Migration
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
            'contractor' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'recipient' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],            
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status'      => [
                'type'           => 'ENUM',
                'constraint'     => ['complet', 'incomplet'],
                'default'        => 'incomplet',
            ],                    
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' =>new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('folders');
    }

    public function down()
    {
        $this->forge->dropTable('folders');
    }
}
