<?php

use yeesoft\i18n\SourceMessagesMigration;

class m151121_233715_i18n_yee_post_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'yee/post';
    }

    public function getMessages()
    {
        return [
            'No posts found. ' => 1,
            'Post' => 1,
            'Posted in' => 1,
            'Posts Activity' => 1,
            'Posts' => 1,
            'Thumbnail' => 1,
        ];
    }
}