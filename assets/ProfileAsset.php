<?php
/**
 * Created by PhpStorm.
 * User: artsem
 * Date: 02.10.17
 * Time: 19:15
 */

namespace app\assets;

use yii\web\AssetBundle;


class ProfileAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/profile.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}