<?php

use yii\db\Migration;


/**
 * Class m190210_141936_BaseMigration
 */
class m190210_141936_BaseMigration extends Migration 
{
	
    
    public function up() {

        $this->CreateMigrationTable();
    }

    public function down() {

        $this->dropIfExist('migrate');
    }

    public function CreateMigrationTable() {

        $this->dropIfExist('migration');

        $this->createTable('migration', [
            'version' => $this->string(180)->notNull(),
            'apply_time' => $this->integer(11)->notNull(),
        ]);

        $this->addPrimaryKey('pk_version', 'migration', ['version']);
    }

    public function dropIfExist($tableName) {
        if (in_array($tableName, $this->getDb()->schema->tableNames)) {
            $this->dropTable($tableName);
        }
    }

}

