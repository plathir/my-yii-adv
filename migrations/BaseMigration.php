<?php
namespace plathir\smartblog\migrations;

use yii\db\Migration;

class BaseMigration extends Migration {

    public function up() {
        
        
    }

    public function down() {
        
        $this->dropIfExist('categories');
        
    }

    public function CreateModuleTables() {

        $this->dropIfExist('categories');
   
       $this->createTable('posts', [
            'id' => $this->bigPrimaryKey(),
            'slug' => $this->string(255)->notNull(),
            'description' => $this->string(255)->notNull(),
            'intro_text' => $this->text()->notNull(),
            'full_text' => $this->text()->notNull(),
            'image' => $this->string()->notNull(),
            'user_created' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'user_last_change' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'publish' => $this->string(1)->notNull(),
            'tags' => $this->text(),
            'category' => $this->integer(),
            'attachments' => $this->text(),
            'gallery' => $this->text(),
            'views' => $this->integer(),
        ]);

        $this->createTable('posts_tags', [
            'post_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        $this->addPrimaryKey('posts_tags_pk', 'posts_tags', ['post_id', 'tag_id']);
        $this->addForeignKey('fk_posts_tags', 'posts_tags', 'post_id', 'posts', 'id', 'CASCADE', 'CASCADE');

    }

    public function dropIfExist($tableName) {
        if (in_array($tableName, $this->getDb()->schema->tableNames)) {
            $this->dropTable($tableName);
        }
    }



}
