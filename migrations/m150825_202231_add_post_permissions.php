<?php

use yii\db\Migration;
use yii\db\Schema;

class m150825_202231_add_post_permissions extends Migration
{

    public function up()
    {

        $this->insert('auth_item_group', ['code' => 'postManagement', 'name' => 'Post Management', 'created_at' => '1440180000', 'updated_at' => '1440180000']);


        $this->insert('auth_item', ['name' => '/admin/post/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/bulk-activate', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/bulk-deactivate', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/bulk-delete', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/create', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/delete', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/grid-page-size', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/grid-sort', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/index', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/toggle-attribute', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/update', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/post/default/view', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item', ['name' => 'fullPostAccess', 'type' => '2', 'description' => 'Manage other users\' posts', 'group_code' => 'postManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'viewPosts', 'type' => '2', 'description' => 'View posts', 'group_code' => 'postManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'editPosts', 'type' => '2', 'description' => 'Edit posts', 'group_code' => 'postManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'deletePosts', 'type' => '2', 'description' => 'Delete posts', 'group_code' => 'postManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'createPosts', 'type' => '2', 'description' => 'Create posts', 'group_code' => 'postManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);


        $this->insert('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/bulk-activate']);
        $this->insert('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/bulk-deactivate']);
        $this->insert('auth_item_child', ['parent' => 'deletePosts', 'child' => '/admin/post/default/bulk-delete']);
        $this->insert('auth_item_child', ['parent' => 'createPosts', 'child' => '/admin/post/default/create']);
        $this->insert('auth_item_child', ['parent' => 'deletePosts', 'child' => '/admin/post/default/delete']);
        $this->insert('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/grid-page-size']);
        $this->insert('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/grid-sort']);
        $this->insert('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/index']);
        $this->insert('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/toggle-attribute']);
        $this->insert('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/update']);
        $this->insert('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/view']);

        $this->insert('auth_item_child', ['parent' => 'createPosts', 'child' => 'viewPosts']);
        $this->insert('auth_item_child', ['parent' => 'deletePosts', 'child' => 'viewPosts']);
        $this->insert('auth_item_child', ['parent' => 'editPosts', 'child' => 'viewPosts']);

        $this->insert('auth_item_child', ['parent' => 'author', 'child' => 'createPosts']);
        $this->insert('auth_item_child', ['parent' => 'author', 'child' => 'viewPosts']);
        $this->insert('auth_item_child', ['parent' => 'author', 'child' => 'editPosts']);
        $this->insert('auth_item_child', ['parent' => 'moderator', 'child' => 'deletePosts']);
        $this->insert('auth_item_child', ['parent' => 'moderator', 'child' => 'fullPostAccess']);
    }

    public function down()
    {

        $this->delete('auth_item_child', ['parent' => 'author', 'child' => 'createPosts']);
        $this->delete('auth_item_child', ['parent' => 'author', 'child' => 'viewPosts']);
        $this->delete('auth_item_child', ['parent' => 'author', 'child' => 'editPosts']);
        $this->delete('auth_item_child', ['parent' => 'moderator', 'child' => 'deletePosts']);
        $this->delete('auth_item_child', ['parent' => 'moderator', 'child' => 'fullPostAccess']);

        $this->delete('auth_item_child', ['parent' => 'createPosts', 'child' => 'viewPosts']);
        $this->delete('auth_item_child', ['parent' => 'deletePosts', 'child' => 'viewPosts']);
        $this->delete('auth_item_child', ['parent' => 'editPosts', 'child' => 'viewPosts']);

        $this->delete('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/bulk-activate']);
        $this->delete('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/bulk-deactivate']);
        $this->delete('auth_item_child', ['parent' => 'deletePosts', 'child' => '/admin/post/default/bulk-delete']);
        $this->delete('auth_item_child', ['parent' => 'createPosts', 'child' => '/admin/post/default/create']);
        $this->delete('auth_item_child', ['parent' => 'deletePosts', 'child' => '/admin/post/default/delete']);
        $this->delete('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/grid-page-size']);
        $this->delete('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/grid-sort']);
        $this->delete('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/index']);
        $this->delete('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/toggle-attribute']);
        $this->delete('auth_item_child', ['parent' => 'editPosts', 'child' => '/admin/post/default/update']);
        $this->delete('auth_item_child', ['parent' => 'viewPosts', 'child' => '/admin/post/default/view']);

        $this->delete('auth_item', ['name' => 'fullPostAccess']);
        $this->delete('auth_item', ['name' => 'viewPosts']);
        $this->delete('auth_item', ['name' => 'editPosts']);
        $this->delete('auth_item', ['name' => 'deletePosts']);
        $this->delete('auth_item', ['name' => 'createPosts']);
        $this->delete('auth_item', ['name' => '/admin/post/*']);
        $this->delete('auth_item', ['name' => '/admin/post/default/*']);
        $this->delete('auth_item', ['name' => '/admin/post/default/bulk-activate']);
        $this->delete('auth_item', ['name' => '/admin/post/default/bulk-deactivate']);
        $this->delete('auth_item', ['name' => '/admin/post/default/bulk-delete']);
        $this->delete('auth_item', ['name' => '/admin/post/default/create']);
        $this->delete('auth_item', ['name' => '/admin/post/default/delete']);
        $this->delete('auth_item', ['name' => '/admin/post/default/grid-page-size']);
        $this->delete('auth_item', ['name' => '/admin/post/default/grid-sort']);
        $this->delete('auth_item', ['name' => '/admin/post/default/index']);
        $this->delete('auth_item', ['name' => '/admin/post/default/toggle-attribute']);
        $this->delete('auth_item', ['name' => '/admin/post/default/update']);
        $this->delete('auth_item', ['name' => '/admin/post/default/view']);

        $this->delete('auth_item_group', ['code' => 'postManagement']);
    }
}