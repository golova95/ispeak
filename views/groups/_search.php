<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $teachers */
/* @var $model app\models\GroupsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'class')->dropDownList([
            ''=>'',
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
    ]);?>

<!--    --><?//= $form->field($model, 'date') ?>

    <?= $form->field($model, 'level')->dropDownList([
            ''=>'',
        'Beginner' => 'Beginner',
        'Elementary' => 'Elementary',
        'Pre-Intermediate' => 'Pre-Intermediate',
        'Intermediate'=>'Intermediate',
        'Upper-Intermediate'=>'Upper-Intermediate',
        'Advanced'=>'Advanced',
        'Native'=>'Native',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сбросить', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
