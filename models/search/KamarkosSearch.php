<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\base\Kamarkos;

/**
* KamarkosSearch represents the model behind the search form about `app\models\base\Kamarkos`.
*/
class KamarkosSearch extends Kamarkos
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
            [['kamar', 'status', 'tanggal_add', 'tanggal_update'], 'safe'],
            [['harga'], 'number'],
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
$query = Kamarkos::find();

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
            'id' => $this->id,
            'harga' => $this->harga,
            'tanggal_add' => $this->tanggal_add,
            'tanggal_update' => $this->tanggal_update,
        ]);

        $query->andFilterWhere(['like', 'kamar', $this->kamar])
            ->andFilterWhere(['like', 'status', $this->status]);

return $dataProvider;
}
}