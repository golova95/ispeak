<?php

//use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use kartik\checkbox\CheckboxX;
use yii\helpers\Html;


$form = ActiveForm::begin(); ?>

    <legend><small>Выберите дни</small></legend>

    <div class="form-group">
        <label class="cbx-label" for="ПН">
            <?= CheckboxX::widget([
                'name' => 'ПН',
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'options'=>['id'=>'ПН'],
                'pluginOptions' => [
                    'enclosedLabel' => true,
                    'threeState'=>false
                ]
            ]); ?>
            Понедельник
        </label>
    </div>


    <div class="form-group">
        <label class="cbx-label" for="ВТ">
            <?= CheckboxX::widget([
                'name' => 'ВТ',
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'options'=>['id'=>'ВТ'],
                'pluginOptions' => [
                    'enclosedLabel' => true,
                    'threeState'=>false
                ]
            ]); ?>
            Вторник
        </label>
    </div>
    <div class="form-group has-success">
        <label class="cbx-label" for="СР">
            <?= CheckboxX::widget([
                'name' => 'СР',
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'options'=>['id'=>'СР'],
                'pluginOptions' => [
                    'enclosedLabel' => true,
                    'threeState'=>false
                ]
            ]); ?>
            Среда
        </label>
    </div>
    <div class="form-group has-error">
        <label class="cbx-label" for="ЧТ">
            <?= CheckboxX::widget([
                'name' => 'ЧТ',
                'value' => 'ЧТ',
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'options'=>['id'=>'ЧТ'],
                'pluginOptions' => [
                    'enclosedLabel' => true,
                    'threeState'=>false
                ]
            ]); ?>
            Четверг
        </label>
    </div>
    <div class="form-group has-warning">
        <label class="cbx-label" for="ПТ">
            <?= CheckboxX::widget([
                'name' => 'ПТ',
                'value' => 'ПТ',
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'options'=>['id'=>'ПТ'],
                'pluginOptions' => [
                    'enclosedLabel' => true,
                    'threeState'=>false
                ]
            ]); ?>
            Пятница
        </label>
    </div>


    <legend><small>Выберите время начала занятия</small></legend>

    <div class="form-group">
        <?= TimePicker::widget([
            'name' => 'time',
            'pluginOptions' => [
                'showSeconds' => false,
                'showMeridian' => false,
                'minuteStep' => 10,
            ]
        ]); ?>
    </div>

<?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>


<?php ActiveForm::end(); ?>