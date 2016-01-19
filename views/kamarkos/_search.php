<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\KamarkosSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="kamarkos-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'kamar') ?>

		<?= $form->field($model, 'harga') ?>

		<?= $form->field($model, 'status') ?>

		<?= $form->field($model, 'tanggal_add') ?>

		<?php // echo $form->field($model, 'tanggal_update') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
