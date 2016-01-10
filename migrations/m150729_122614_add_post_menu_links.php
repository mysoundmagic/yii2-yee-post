<?php

use yii\db\Migration;

class m150729_122614_add_post_menu_links extends Migration
{

    public function up()
    {
        $this->insert('menu_link', ['id' => 'post', 'menu_id' => 'admin-menu', 'link' => '/post/default/index', 'image' => 'pencil', 'created_by' => 1, 'order' => 3]);
        $this->insert('menu_link_lang', ['link_id' => 'post', 'label' => 'Posts', 'language' => 'en-US']);
    }

    public function down()
    {
        $this->delete('menu_link', ['like', 'id', 'post']);
    }
}