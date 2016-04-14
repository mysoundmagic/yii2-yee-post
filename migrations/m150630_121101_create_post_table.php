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

        $this->createTable('post_category', [
            'id' => 'pk',
            'slug' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'visible' => Schema::TYPE_INTEGER . " NOT NULL DEFAULT '1' COMMENT '0-hidden,1-visible'",
            'view' => Schema::TYPE_STRING . "(255) NOT NULL DEFAULT 'post'",
            'layout' => Schema::TYPE_STRING . "(255) NOT NULL DEFAULT 'main'",
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'created_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'updated_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'left_border' => Schema::TYPE_INTEGER . ' NOT NULL',
            'right_border' => Schema::TYPE_INTEGER . ' NOT NULL',
            'depth' => Schema::TYPE_INTEGER . ' NOT NULL',
            'KEY `post_category_slug` (`slug`)',
            'KEY `post_category_visible` (`visible`)',
            'CONSTRAINT `fk_post_category_created_by` FOREIGN KEY (created_by) REFERENCES user (id) ON DELETE SET NULL ON UPDATE CASCADE',
            'CONSTRAINT `fk_post_category_updated_by` FOREIGN KEY (updated_by) REFERENCES user (id) ON DELETE SET NULL ON UPDATE CASCADE',
        ], $tableOptions);

        $this->createIndex('left_border', 'post_category', ['left_border', 'right_border']);
        $this->createIndex('right_border', 'post_category', ['right_border']);

        $this->insert('post_category', ['id' => 1, 'slug' => 'root', 'depth' => 0, 'created_at' => 1455033000, 'visible' => 0, 'left_border' => 0, 'right_border' => 2147483647]);

        $this->createTable('post_category_lang', [
            'id' => 'pk',
            'post_category_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'language' => Schema::TYPE_STRING . '(6) NOT NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'KEY `post_category_lang_id` (`post_category_id`)',
            'KEY `post_category_lang_language` (`language`)',
            'CONSTRAINT `fk_post_category_lang` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

        $this->createTable('post', [
            'id' => 'pk',
            'slug' => Schema::TYPE_STRING . '(127) NOT NULL DEFAULT ""',
            'category_id' => Schema::TYPE_INTEGER . '(11) DEFAULT NULL',
            'status' => Schema::TYPE_INTEGER . '(1) unsigned NOT NULL DEFAULT "0" COMMENT "0-pending,1-published"',
            'comment_status' => Schema::TYPE_INTEGER . '(1) unsigned NOT NULL DEFAULT "1" COMMENT "0-closed,1-open"',
            'thumbnail' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'published_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'created_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'updated_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'revision' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "1"',
            'CONSTRAINT `fk_post_category_id` FOREIGN KEY (`category_id`) REFERENCES `post_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE',
            'CONSTRAINT `fk_post_created_by` FOREIGN KEY (created_by) REFERENCES user (id) ON DELETE SET NULL ON UPDATE CASCADE',
            'CONSTRAINT `fk_post_updated_by` FOREIGN KEY (updated_by) REFERENCES user (id) ON DELETE SET NULL ON UPDATE CASCADE',
        ], $tableOptions);

        $this->createIndex('post_slug', 'post', 'slug');
        $this->createIndex('post_category_id', 'post', 'category_id');
        $this->createIndex('post_status', 'post', 'status');
        $this->createIndex('post_author', 'post', 'created_by');

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
        $this->dropForeignKey('fk_post_category_id', 'post');
        $this->dropForeignKey('fk_post_created_by', 'post');
        $this->dropForeignKey('fk_post_updated_by', 'post');
        $this->dropForeignKey('fk_post_lang', 'post_lang');

        $this->dropForeignKey('fk_post_category_lang', 'post_category_lang');
        $this->dropForeignKey('fk_post_category_created_by', 'post_category');
        $this->dropForeignKey('fk_post_category_updated_by', 'post_category');

        $this->dropTable('post_category_lang');
        $this->dropTable('post_category');

        $this->dropTable('post_lang');
        $this->dropTable('post');
    }
}