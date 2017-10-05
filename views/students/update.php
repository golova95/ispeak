
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $groups */
/* @var $responsible */

$this->title = 'Обновить студента: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Студенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'groups' => $groups,
        'responsible' => $responsible,
        'model' => $model,
    ]) ?>

</div>
