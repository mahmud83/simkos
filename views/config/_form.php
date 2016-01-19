<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Config $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->config_id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="config-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Config',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'config_id')->textInput() ?>
			<?= $form->field($model, 'config_name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'config_value')->textarea(['rows' => 6]) ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Config',
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
