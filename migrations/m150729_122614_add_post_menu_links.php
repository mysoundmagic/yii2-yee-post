<?php

use yii\db\Migration;
use yii\db\Schema;

class m150729_122614_add_post_menu_links extends Migration
{

    public function up()
    {
        $this->insert('menu_link', ['id' => 'post', 'menu_id' => 'admin-main-menu', 'link' => '/post/default/index', 'image' => 'pencil', 'order' => 3]);
        $this->insert('menu_link_lang', ['link_id' => 'post', 'label' => 'Posts', 'language' => 'en' ]);
    }

    public function down()
    {
        $this->delete('menu_link', ['like', 'id', 'post']);
    }
}