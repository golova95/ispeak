<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

\app\assets\MainAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody();
if (Yii::$app->user->isGuest || Yii::$app->user->identity['user_id'] != 1 || Yii::$app->errorHandler->exception) {?>
<?= $content ?>
<?php }else{?>








    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img class='logo' src="/files/dev/logo.png" alt="logo">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <?=
                Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                'Выйти',
                ['class' => 'btn btn-link logout']
                )
                . Html::endForm();
                ?>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/students/"><i class="fa fa-fw fa-user-plus"></i>  СТУДЕНТЫ </a>
                    </li>
                    <li>
                        <a href="/groups/"><i class="fa fa-fw fa-group"></i> ГРУППЫ</a>
                    </li>
                    <li>
                        <a href="/teachers/"><i class="fa fa-fw fa fa-pencil"></i> ПРЕПОДАВАТЕЛИ</a>
                    </li>
                    <li>
                        <a href="/responsible/"><i class="fa fa-fw fa fa-plus"></i> ОТВЕТСТВЕННЫЕ</a>
                    </li>
                    <li>
                        <a href="/products/"><i class="fa fa-fw fa fa-leanpub"></i> ПРОДУКТЫ</a>
                    </li>
                    <li>
                        <a href="/timetable/"><i class="fa fa-fw fa-calendar"></i>  РАСПИСАНИЕ</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main" >
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])  ?>

                    <?php ?>
                    <?= $content ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <footer>

    </footer>




<?php } $this->endBody(); ?>
</body>
</html>
<?php $this->endPage() ?>
