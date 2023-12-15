<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class UploadedFiles extends Migration
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
            'folder_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],            
            'doc_type'      => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_type'      => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'file_name'      => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('uploaded_files');
    }

    public function down()
    {
        $this->forge->dropTable('uploaded_files');
    }
}
