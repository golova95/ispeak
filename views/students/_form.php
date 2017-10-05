<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $groups */
/* @var $responsible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->input('email', ['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsible_id')->dropDownList($responsible); ?>

    <?= $form->field($model, 'appointed_id')->dropDownList($responsible); ?>

    <?= $form->field($model, 'confirmed_id')->dropDownList($responsible) ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course_id')->dropDownList([
        '96 ак.часов' => '96 ак.часов',
        '192 ак.часа' => '192 ак.часа',
        '6 месяцев' => '6 месяцев',
        '1 год' => '1 год',
    ]) ?>

    <?= $form->field($model, 'test_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')->dropDownList($groups); ?>

    <?= $form->field($model, 'deposit')->textInput() ?>

    <?= $form->field($model, 'payments')->textInput() ?>

    <?= $form->field($model, 'payment_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'test_mark')->textInput() ?>

    <?= $form->field($model, 'last_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => true, 'rows'=>2,'cols'=>5]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
