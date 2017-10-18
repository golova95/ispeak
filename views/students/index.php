<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить Студента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute'=>'Группа',
                'value' => 'group.name',
            ],
            'name',
            'phone',
            'from',
            [
                'attribute'=>'Тип курса',
                'value' => 'products.name',
            ],
            // 'purpose',
            // 'test_level',
            // 'group_id',
             'deposit',
            [
                'attribute' => 'responsible_id',
                'value' => 'responsible.name',
            ],
            // 'payments',
            // 'payment_type',
            // 'test_mark',
            // 'last_date',
            // 'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
