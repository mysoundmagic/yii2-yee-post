<?php

use yii\db\Migration;
use yii\db\Schema;

class m160414_212558_add_view_post extends Migration
{

    public function safeUp()
    {
        $this->addColumn('post', 'view', Schema::TYPE_STRING."(255) NOT NULL DEFAULT 'post'");
        $this->addColumn('post', 'layout', Schema::TYPE_STRING."(255) NOT NULL DEFAULT 'main'");
    }

    public function safeDown()
    {
        $this->dropColumn('post', 'view');
        $this->dropColumn('post', 'layout');
    }
}