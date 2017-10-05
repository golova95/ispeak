<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $hash app\controllers\SiteController */
/* @var $model app\models\RecoverForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

\app\assets\LoginAsset::register($this);

$this->title = 'Password recover';
?>
<div class="login-page">

    <div class="form">

        <div class="logo">
            <a href="http://ispeak-school.by" target="_blank"><?= Html::img('@web/files/dev/logo.png');?></a>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'restore-form',
            'enableAjaxValidation' => true,
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{input}<div class=\"error\">{error}</div>",
            ],
            'options' => [
                'class' => 'recover-form'
            ]
        ]); ?>

        <?= $form->field($model, 'ps1')->Input('password', ['autofocus' => true, 'placeholder' => 'Пароль']) ?>

        <?= $form->field($model, 'ps2')->Input('password', ['autofocus' => true, 'placeholder' => 'Пароль']) ?>

        <?= Html::hiddenInput('hash', $hash); ?>

        <div class="form-group">
            <div>
                <?= Html::submitButton('Сбросить пароль', ['class' => 'restore-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
