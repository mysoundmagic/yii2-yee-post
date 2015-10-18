<?php

use yii\db\Migration;
use yii\db\Schema;

class m150630_121101_create_post_table extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('post', [
            'id' => 'pk',
            'created_by' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'slug' => Schema::TYPE_STRING . '(200) NOT NULL DEFAULT ""',
            'status' => Schema::TYPE_INTEGER . '(1) unsigned NOT NULL DEFAULT "0" COMMENT "0-pending,1-published"',
            'comment_status' => Schema::TYPE_INTEGER . '(1) unsigned NOT NULL DEFAULT "1" COMMENT "0-closed,1-open"',
            'published_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_by' => Schema::TYPE_INTEGER . '(11) DEFAULT NULL',
            'revision' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "1"',
        ], $tableOptions);

        $this->createIndex('post_slug', 'post', 'slug');
        $this->createIndex('post_status', 'post', 'status');
        $this->createIndex('post_author', 'post', 'author_id');

        $this->createTable('post_lang', [
            'id' => 'pk',
            'post_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'language' => Schema::TYPE_STRING . '(6) NOT NULL',
            'title' => Schema::TYPE_TEXT . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' DEFAULT NULL',
        ], $tableOptions);


        $this->createIndex('post_lang_post_id', 'post_lang', 'post_id');
        $this->createIndex('post_lang_language', 'post_lang', 'language');
        $this->addForeignKey('fk_post_lang', 'post_lang', 'post_id', 'post', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_post_lang', 'post_lang');
        $this->dropTable('post_lang');
        $this->dropTable('post');
    }
}