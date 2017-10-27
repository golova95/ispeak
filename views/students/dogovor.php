<?php

use \PhpOffice\PhpWord\TemplateProcessor;


/* @var $this yii\web\View */
/* @var $model app\models\Students */

$array = [
    'января',
    'февраля',
    'марта',
    'апреля',
    'мая',
    'июня',
    'июля',
    'августа',
    'сентября',
    'октября',
    'ноября',
    'декабря',
];

$templateProcessor = new TemplateProcessor('files/template.docx');
$templateProcessor->setValue('student_id', $model->id);

$templateProcessor->setValue('day', date("j"));
$templateProcessor->setValue('m', $array[(int)date("n") - 1]);
$templateProcessor->setValue('y', date("Y"));
$templateProcessor->setValue('name', $model->name);
$templateProcessor->setValue('data', $model->data);
$templateProcessor->setValue('type', $model->course_type);
$templateProcessor->setValue('price', $model->full_price);

$templateProcessor -> saveAs('dogovor.docx');

$file_url = 'dogovor.docx';

if (file_exists($file_url)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file_url).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_url));
    readfile($file_url);
    exit;
}
