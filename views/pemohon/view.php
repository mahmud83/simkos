<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Pemohon $model
*/

$this->title = 'Pemohon ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud pemohon-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'List Pemohons', ['index'], ['class'=>'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <?= $model->id ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('app\models\Pemohon'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'id',
        'nomor_identitas',
        'nama',
            [
                'attribute'=>'jenis_kelamin',
                'value'=>app\models\Pemohon::getJenisKelaminValueLabel($model->jenis_kelamin),
            ],
        'tempat_lahir',
        'tanggal_lahir',
            [
                'attribute'=>'agama',
                'value'=>app\models\Pemohon::getAgamaValueLabel($model->agama),
            ],
        'alamat:ntext',
        'pekerjaan',
        'tempat',
        'nomor_telpon',
        'nama_orangtua',
            [
                'attribute'=>'agama_orangtua',
                'value'=>app\models\Pemohon::getAgamaOrangtuaValueLabel($model->agama_orangtua),
            ],
        'pekerjaan_orangtua',
        'nomor_telpon_orangtua',
        'nama_saudara',
            [
                'attribute'=>'agama_saudara',
                'value'=>app\models\Pemohon::getAgamaSaudaraValueLabel($model->agama_saudara),
            ],
        'pekerjaan_saudara',
        'nomor_telpon_saudara',
        'hubungan_saudara',
        'keterangan:ntext',
        'tanggal_add',
        'tanggal_update',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['app\models\Pemohon'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
