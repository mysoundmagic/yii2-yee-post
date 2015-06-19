<?php

namespace yeesoft\post\models;

/**
 * This is the ActiveQuery class for [[Post]].
 *
 * @see Post
 */
class PostQuery extends \yii\db\ActiveQuery {

    public function init() {
        $modelClass = $this->modelClass;
        $tableName = $modelClass::tableName();
        $this->andWhere([$tableName . '.type' => Post::TYPE_POST]);
        parent::init();
    }

    public function active() {
        $this->andWhere(['status' => Post::STATUS_PUBLISHED]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return Post[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Post|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}
