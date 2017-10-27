<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Студенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены что хотите удалить',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Скачать договор', ['dogovor', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'from',
             [
                 'label' => 'Ответственный',
                 'value' => isset($model->responsible->name) ? $model->responsible->name : '',
             ],
            [
                'label' => 'Встречу назначил',
                'value' => isset($model->appointed->name) ? $model->appointed->name : '',
            ],
            [
                'label' => 'Встречу подтвердил',
                'value' => isset($model->confirmed->name) ? $model->confirmed->name : '',
            ],
            'purpose',
            [
                'label' => 'Тип курса',
                'value' => isset($model->products->name) ? $model->products->name : '',
            ],
            'test_level',
            'group.name',
            'deposit',
            'payments',
            'payment_type',
            'test_mark',
            'last_date',
            'comment',

        ],
    ]);

    ?>



</div>
