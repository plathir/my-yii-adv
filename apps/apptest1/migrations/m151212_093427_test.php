<?php

use yii\db\Schema;
use yii\db\Migration;

class m151212_093427_test extends Migration {

    public function up() {
        $this->createTable('recipes', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);
    }

    public function down() {
        $this->dropTable('recipes');
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
