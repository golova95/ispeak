<?php

namespace PhpOffice\PhpWord;

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
$templateProcessor->setValue('student_id', 1);

$templateProcessor->setValue('day', date("j"));
$templateProcessor->setValue('m', $array[(int)date("n") - 1]);
$templateProcessor->setValue('y', date("Y"));
$templateProcessor->setValue('name', "Головенчик Артём Сергеевич");
$templateProcessor->setValue('data1', "mp2705000, пр. газеты правда 60 к2, квартира 111");
$templateProcessor->setValue('type', 'групповые занятия');
$templateProcessor->setValue('price', '420 (четыреста двадцать)');
$templateProcessor->setValue('data2', "mp2705000, пр. газеты правда 60 к2, квартира 111");

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