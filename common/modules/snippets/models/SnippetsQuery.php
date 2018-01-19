<?php

namespace common\modules\snippets\models;

/**
 * This is the ActiveQuery class for [[Snippets]].
 *
 * @see Snippets
 */
class SnippetsQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return Snippets[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Snippets|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}
