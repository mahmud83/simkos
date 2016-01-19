<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\PemohonSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="pemohon-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nomor_identitas') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'jenis_kelamin') ?>

		<?= $form->field($model, 'tempat_lahir') ?>

		<?php // echo $form->field($model, 'tanggal_lahir') ?>

		<?php // echo $form->field($model, 'agama') ?>

		<?php // echo $form->field($model, 'alamat') ?>

		<?php // echo $form->field($model, 'pekerjaan') ?>

		<?php // echo $form->field($model, 'tempat') ?>

		<?php // echo $form->field($model, 'nomor_telpon') ?>

		<?php // echo $form->field($model, 'nama_orangtua') ?>

		<?php // echo $form->field($model, 'agama_orangtua') ?>

		<?php // echo $form->field($model, 'pekerjaan_orangtua') ?>

		<?php // echo $form->field($model, 'nomor_telpon_orangtua') ?>

		<?php // echo $form->field($model, 'nama_saudara') ?>

		<?php // echo $form->field($model, 'agama_saudara') ?>

		<?php // echo $form->field($model, 'pekerjaan_saudara') ?>

		<?php // echo $form->field($model, 'nomor_telpon_saudara') ?>

		<?php // echo $form->field($model, 'hubungan_saudara') ?>

		<?php // echo $form->field($model, 'keterangan') ?>

		<?php // echo $form->field($model, 'tanggal_add') ?>

		<?php // echo $form->field($model, 'tanggal_update') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
