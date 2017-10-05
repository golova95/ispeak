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
<div class="confirm">

<!--    <div class="form">-->

        <div class="logo">
            <a href="http://ispeak-school.by" target="_blank"><?= Html::img('@web/files/dev/logo.png');?></a>
        </div>


    <div>
        <h1>
            Спасибо! Инструкции высланы на адрес, указанный вами при регистрации.
        </h1>
    </div>

<!--    </div>-->

</div>