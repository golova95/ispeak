<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $groups app\models\Groups */
/* @var $responsible */

$this->title = 'Добавить студента';
$this->params['breadcrumbs'][] = ['label' => 'Студенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'groups' => $groups,
        'responsible' => $responsible,
        'model' => $model,
    ]) ?>

</div>
