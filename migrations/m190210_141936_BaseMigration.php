<?php

use yii\db\Migration;

/**
 * Class m190210_141936_BaseMigration
 */
class m190210_141936_BaseMigration extends Migration {

    public function up() {

        $this->CreateMigrationTable();
        $this->CreateSessionTable();
    }

    public function down() {

        $this->dropIfExist('migrate');
        $this->dropIfExist('session');
    }

    public function CreateMigrationTable() {

        $this->dropIfExist('migration');

        $this->createTable('{{%migration}}', [
            'version' => $this->string(180)->notNull(),
            'apply_time' => $this->integer(11)->notNull(),
                ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addPrimaryKey('pk_version', '{{%migration}}', ['version']);
    }

    public function CreateSessionTable() {
        $this->createTable('{{%session}}', [
            'id' => $this->string()->notNull(),
            'expire' => $this->integer(),
            'data' => $this->binary(),
            'user_id' => $this->integer(11),
            'environment' => $this->string(10),
            'last_write' => $this->timestamp(),
            'PRIMARY KEY ([[id]])',
                ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    public function dropIfExist($tableName) {
        if (in_array($this->db->tablePrefix . $tableName, $this->getDb()->schema->tableNames)) {
            $this->dropTable($this->db->tablePrefix . $tableName);
        }
    }

}
