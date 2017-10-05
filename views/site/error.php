<?php

use yii\helpers\Html;

\app\assets\ErrorAsset::register($this);
$this->title = '404';
?>
<div class="wrap">
    <div class="logo">
        <a href="http://ispeak-school.by" target="_blank"><?= Html::img('@web/files/dev/logo.png');?></a>
        <h1>404</h1>
        <p>Sorry - Page not Found!</p>
    </div>
</div>
