<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Pemohon $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="pemohon-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Pemohon',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'id')->textInput() ?>
			<?= $form->field($model, 'nomor_identitas')->textInput() ?>
			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
			<?=                         $form->field($model, 'jenis_kelamin')->dropDownList(
                            app\models\Pemohon::optsjeniskelamin()
                        ); ?>
			<?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'tanggal_lahir')->textInput() ?>
			<?=                         $form->field($model, 'agama')->dropDownList(
                            app\models\Pemohon::optsagama()
                        ); ?>
			<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nomor_telpon')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nama_orangtua')->textInput(['maxlength' => true]) ?>
			<?=                         $form->field($model, 'agama_orangtua')->dropDownList(
                            app\models\Pemohon::optsagamaorangtua()
                        ); ?>
			<?= $form->field($model, 'pekerjaan_orangtua')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nomor_telpon_orangtua')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nama_saudara')->textInput(['maxlength' => true]) ?>
			<?=                         $form->field($model, 'agama_saudara')->dropDownList(
                            app\models\Pemohon::optsagamasaudara()
                        ); ?>
			<?= $form->field($model, 'pekerjaan_saudara')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nomor_telpon_saudara')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'hubungan_saudara')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'tanggal_add')->textInput() ?>
			<?= $form->field($model, 'tanggal_update')->textInput() ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Pemohon',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
                <hr/>
                <?php echo $form->errorSummary($model); ?>
                <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? 'Create' : 'Save'),
                [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
                );
                ?>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>
