<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Config $model
 */

$this->title = 'Config ' . $model->config_id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->config_id, 'url' => ['view', 'config_id' => $model->config_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud config-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'config_id' => $model->config_id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
