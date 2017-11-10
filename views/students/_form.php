<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $groups */
/* @var $responsible */
/* @var $products */
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

    <?= $form->field($model, 'course_id')->dropDownList($products) ?>

    <?= $form->field($model, 'test_level')->dropDownList([
        'Beginner' => 'Beginner',
        'Elementary' => 'Elementary',
        'Pre-Intermediate' => 'Pre-Intermediate',
        'Intermediate'=>'Intermediate',
        'Upper-Intermediate'=>'Upper-Intermediate',
        'Advanced'=>'Advanced',
        'Native'=>'Native',
    ]);?>

    <?= $form->field($model, 'group_id')->dropDownList($groups); ?>

    <?= $form->field($model, 'deposit')->textInput() ?>

    <?= $form->field($model, 'payments')->textInput() ?>

    <?= $form->field($model, 'payment_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_price')->textInput(['placeholder' => 'цена цифрами и прописью']) ?>

    <?= $form->field($model, 'last_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => true, 'rows'=>6,'cols'=>5]) ?>

    <?= $form->field($model, 'test_mark')->textInput() ?>

    <?= $form->field($model, 'data')->textarea(['maxlength' => true, 'rows'=>4,'cols'=>5, 'placeholder' => 'Регистрационные данные Заказчика: паспорт, дата рождения, адрес регистрации']) ?>

    <?= $form->field($model, 'course_type')->textInput(['placeholder' => 'Групповые или индивидуальные']) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
