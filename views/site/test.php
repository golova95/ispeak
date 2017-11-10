<?php

//use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use kartik\checkbox\CheckboxX;
use yii\helpers\Html;
use app\models\Timetable;


$time = Timetable::find()
    ->asArray()
    ->all();


foreach ($time as $t){
    $a[]=['id' => $t['id'], 'name' => 'azazaza'];
    $t['name'] = 'azaz';
    unset($t);

    echo "<br>";
}

var_dump($a);