<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\PemohonSearch $searchModel
*/

$this->title = 'Pemohon';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud pemohon-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    
        <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <i><?= 'Pemohons' ?></i>
                </h2>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager'        => [
                    'class'          => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel'  => 'Last'                ],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                'columns' => [

                        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			'nomor_identitas',
			'nama',
			'tempat_lahir',
			'tanggal_lahir',
			[
                'attribute'=>'agama',
                'value' => function ($model) {
                    return app\models\Pemohon::getAgamaValueLabel($model->agama);
                }    
            ],
			'nomor_telpon',
			[
                'attribute'=>'agama_orangtua',
                'value' => function ($model) {
                    return app\models\Pemohon::getAgamaOrangtuaValueLabel($model->agama_orangtua);
                }    
            ],
			/*'nomor_telpon_orangtua'*/
			/*[
                'attribute'=>'agama_saudara',
                'value' => function ($model) {
                    return app\models\Pemohon::getAgamaSaudaraValueLabel($model->agama_saudara);
                }    
            ]*/
			/*'nomor_telpon_saudara'*/
			/*[
                'attribute'=>'jenis_kelamin',
                'value' => function ($model) {
                    return app\models\Pemohon::getJenisKelaminValueLabel($model->jenis_kelamin);
                }    
            ]*/
			/*'alamat:ntext'*/
			/*'keterangan:ntext'*/
			/*'tanggal_add'*/
			/*'tanggal_update'*/
			/*'pekerjaan'*/
			/*'tempat'*/
			/*'nama_orangtua'*/
			/*'pekerjaan_orangtua'*/
			/*'nama_saudara'*/
			/*'pekerjaan_saudara'*/
			/*'hubungan_saudara'*/
                ],
            ]); ?>
                </div>

            </div>

        </div>

        <?php \yii\widgets\Pjax::end() ?>

    
</div>
