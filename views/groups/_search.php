<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GroupsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'prof') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'places') ?>

    <?php // echo $form->field($model, 'first') ?>

    <?php // echo $form->field($model, 'last') ?>

    <?php // echo $form->field($model, 'homework') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
