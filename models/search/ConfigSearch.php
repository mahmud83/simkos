<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Config;

/**
* ConfigSearch represents the model behind the search form about `app\models\Config`.
*/
class ConfigSearch extends Config
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['config_id'], 'integer'],
            [['config_name', 'config_value'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
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
public function search($params)
{
$query = Config::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'config_id' => $this->config_id,
        ]);

        $query->andFilterWhere(['like', 'config_name', $this->config_name])
            ->andFilterWhere(['like', 'config_value', $this->config_value]);

return $dataProvider;
}
}