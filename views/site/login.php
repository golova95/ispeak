<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

\app\assets\LoginAsset::register($this);
$this->title = 'Welcom';
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
                'class' => 'restore-form'
            ]
        ]); ?>

        <?= $form->field($model, 'email')->Input('email', ['autofocus' => true, 'placeholder'=>'E-mail']) ?>

        <div class="form-group">
            <div>
                <?= Html::submitButton('Восстановить пароль', ['class' => 'restore-button']) ?>
            </div>
        </div>

        <p class="message">Вспомнили? <a href="#">Войти</a></p>

        <?php ActiveForm::end(); ?>



    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{input}<div class=\"error\">{error}</div>",
        ],
        'options' => [
            'class' => 'login-form'
        ]
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder'=>'Логин']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Пароль']) ?>

        <div class="form-group">
            <div>
                <?= Html::submitButton('Войти', ['class' => 'login-button']) ?>
            </div>
        </div>

        <p class="message">Забыли пароль <a href="#">Восстановить</a></p>

    <?php ActiveForm::end(); ?>
    </div>

</div>
