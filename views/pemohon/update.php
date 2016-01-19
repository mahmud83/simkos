<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Pemohon $model
 */

$this->title = 'Pemohon ' . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud pemohon-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
