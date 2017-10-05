<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 03.10.17
 * Time: 0:35
 */

namespace app\assets;

use yii\web\AssetBundle;



class TestAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
    ];
    public $js = [
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}