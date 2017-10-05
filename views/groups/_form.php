<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Groups */
/* @var $teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prof')->dropDownList($teachers); ?>

    <?= $form->field($model, 'class')->dropDownList([
        '2-1' => '2-1',
        '2-2' => '2-2',
        '2-3' => '2-3',
        '2-4' => '2-4',
        '2-5' => '2-5',
        '3-1' => '3-1',
        '3-2' => '3-2',
        '3-3' => '3-3',
        '3-4' => '3-4',
        '3-5' => '3-5',
    ]); ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList([
        'Beginner' => 'Beginner',
        'Elementary' => 'Elementary',
        'Pre-Intermediate' => 'Pre-Intermediate',
        'Intermediate'=>'Intermediate',
        'Upper-Intermediate'=>'Upper-Intermediate',
        'Advanced'=>'Advanced',
        'Native'=>'Native',
    ]); ?>

    <?= $form->field($model, 'places')->textInput() ?>

    <?= $form->field($model, 'first')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'last')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'homework')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
