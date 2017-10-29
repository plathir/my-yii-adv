<?php

namespace common\modules\snippets\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use \common\modules\snippets\models\Snippets;

/**
 * SnippetsSearch represents the model behind the search form of `common\modules\snippets\models\Snippets`.
 */
class SnippetsSearch extends Snippets {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'updated_by', 'updated_at'], 'integer'],
            [['created_at'], 'date', 'format' => Yii::$app->settings->getSettings('ShortDateFormat'), 'message' => '{attribute} must be DD/MM/YYYY format.'],
            [['description', 'full_text', 'publish'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Snippets::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'full_text', $this->full_text])
                ->andFilterWhere(['like', "( FROM_UNIXTIME(snippets.created_at, '" . Yii::$app->settings->getSettings('DBShortDateFormat') . " %h:%i:%s %p' ))", $this->created_at])
                ->andFilterWhere(['like', "( FROM_UNIXTIME(snippets.updated_at, '" . Yii::$app->settings->getSettings('DBShortDateFormat') . " %h:%i:%s %p' ))", $this->updated_at])
                ->andFilterWhere(['like', 'publish', $this->publish]);

        return $dataProvider;
    }

}
