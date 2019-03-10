<?php

use yii\db\Migration;

/**
 * Class m190210_141936_BaseMigration
 */
class m190227_093300_SnippetsMigration extends Migration {

    public function up() {

        $this->CreateMigrationTable();
    }

    public function down() {

        $this->dropIfExist('snippets');
    }

    public function CreateMigrationTable() {

        $this->dropIfExist('snippets');

        $this->createTable('{{%snippets}}', [
            'id' => $this->PrimaryKey(),
            'description' => $this->string(255)->notNull(),
            'example' => $this->string(255)->notNull(),
            'full_text' => $this->text()->notNull(),
            'created_by' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_by' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'publish' => $this->string(1)->notNull(),
                ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

    }

    public function dropIfExist($tableName) {
        if (in_array($this->db->tablePrefix .$tableName, $this->getDb()->schema->tableNames)) {
            $this->dropTable($this->db->tablePrefix .$tableName);
        }
    }

}
