<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemohon;

/**
* PemohonSearch represents the model behind the search form about `app\models\Pemohon`.
*/
class PemohonSearch extends Pemohon
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'nomor_identitas'], 'integer'],
            [['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'pekerjaan', 'tempat', 'nomor_telpon', 'nama_orangtua', 'agama_orangtua', 'pekerjaan_orangtua', 'nomor_telpon_orangtua', 'nama_saudara', 'agama_saudara', 'pekerjaan_saudara', 'nomor_telpon_saudara', 'hubungan_saudara', 'keterangan', 'tanggal_add', 'tanggal_update'], 'safe'],
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
$query = Pemohon::find();

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
            'nomor_identitas' => $this->nomor_identitas,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tanggal_add' => $this->tanggal_add,
            'tanggal_update' => $this->tanggal_update,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'tempat', $this->tempat])
            ->andFilterWhere(['like', 'nomor_telpon', $this->nomor_telpon])
            ->andFilterWhere(['like', 'nama_orangtua', $this->nama_orangtua])
            ->andFilterWhere(['like', 'agama_orangtua', $this->agama_orangtua])
            ->andFilterWhere(['like', 'pekerjaan_orangtua', $this->pekerjaan_orangtua])
            ->andFilterWhere(['like', 'nomor_telpon_orangtua', $this->nomor_telpon_orangtua])
            ->andFilterWhere(['like', 'nama_saudara', $this->nama_saudara])
            ->andFilterWhere(['like', 'agama_saudara', $this->agama_saudara])
            ->andFilterWhere(['like', 'pekerjaan_saudara', $this->pekerjaan_saudara])
            ->andFilterWhere(['like', 'nomor_telpon_saudara', $this->nomor_telpon_saudara])
            ->andFilterWhere(['like', 'hubungan_saudara', $this->hubungan_saudara])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

return $dataProvider;
}
}