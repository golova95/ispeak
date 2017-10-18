<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Students */
/* @var $students app\models\Students */

use yii\helpers\Html;
use yii\widgets\DetailView;

\app\assets\ProfileAsset::register($this);

$this->title = 'iSpeak Profile';
?>





<!--<div class="site-contact">-->
<!--    <h1> Welcom --><?//= Html::encode($model->name) ?><!--</h1>-->
<!---->
<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'name',
//            'phone',
//            'email',
//            'purpose',
//            'test_level',
//            'group.name',
//            'group.prof',
//            'payments',
//            'test_mark',
//            'last_date',
//            'group.homework',
//
//        ],
//    ]) ?>
<!---->
<!---->
<!---->
<!---->
<!--</div>-->








<div class="container">
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="panel panel-default">
                <div class="userprofile social ">
                    <div class="userpic"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="userpicimg"> </div>
                    <h3 class="username"><?=$model->name?></h3>
                </div>
                <div class="col-md-12 border-top border-bottom">
                    <ul class="nav nav-pills pull-left countlist" role="tablist">
                        <li role="presentation">
                            <h3><?=$model->group->name?><br>
                                <small>Группа</small> </h3>
                        </li>
                        <li role="presentation">
                        <h3><?=$model->group->class?><br>
                            <small>Аудитория</small> </h3>
                        </li>
                        <li role="presentation">
                            <h3><?=$model->group->homework?><br>
                                <small>Домашнее задание</small> </h3>
                        </li>
                        <li role="presentation">
                            <h3><?=$model->group->teachers->name?><br>
                                <small class="teachers_phone"><?=$model->group->teachers->phone?></small>
                            </h3>
                        </li>
                    </ul>
                    <?= Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                    'Выйти',
                    ['class' => 'btn btn-primary followbtn'])
                    . Html::endForm() ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- /.col-md-12 -->
        <div class="col-md-4 col-sm-12 pull-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Персональная информация</h1>
                    <p class="page-subtitle small"><?=$model->phone?></p>
                    <p class="page-subtitle small"><?=$model->email?></p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Успеваемость / Домашки</h1>
<!--                    <p class="page-subtitle small">Like to work fr different business</p>-->
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item">Worked with 1000+ people</li>
                        <li class="list-group-item">60+ offices</li>
                        <li class="list-group-item">50000+ satify customers</li>
                        <li class="list-group-item">Work hours many and many still counting</li>
                        <li class="list-group-item">Customer satisfaction for servics</li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Общая информация </h1>
<!--                    <p class="page-subtitle small"></p>-->
                </div>
                <div class="col-md-12">
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">Иван Петрович</h4>
                            Занятие переноситься на пятницу, 16:20 </div>
                    </div>
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">Иван Петрович</h4>
                            Мероприятие "THE TING GO SKRRA LIRICS" или деградация пройдёт 4 октября</div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Одногруппники</h1>
                    <p class="page-subtitle small">Онлайн 4</p>
                </div>
                <div class="col-md-12">
                    <div class="memberblock">
                        <?
                        foreach ($students as $student)
                        {
                            ?>

                            <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                            <div class="memmbername"><?=$student->name?></div>
                        </a>

                        <?
                        }
                        ?>
<!--                        <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">-->
<!--                            <div class="memmbername">Иван Иванов</div>-->
<!--                        </a>-->
<!--                        <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">-->
<!--                            <div class="memmbername">Иван Иванов</div>-->
<!--                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"-->
<!--                                                             alt="">-->
<!--                            <div class="memmbername">Иван Иванов</div>-->
<!--                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"-->
<!--                                                             alt="">-->
<!--                            <div class="memmbername">Иван Иванов</div>-->
<!--                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"-->
<!--                                                             alt="">-->
<!--                            <div class="memmbername">Иван Иванов</div>-->
<!--                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png"-->
<!--                                                             alt="">-->
<!--                            <div class="memmbername">Иван Иванов</div>-->
<!--                        </a>-->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
<!--        <div class="col-md-8 col-sm-12 pull-left posttimeline">-->
<!--            <div class="panel panel-default">-->
<!--                <div class="panel-body">-->
<!--                    <div class="status-upload nopaddingbtm">-->
<!--                        <form>-->
<!--                            <textarea class="form-control" placeholder="What are you doing right now?"></textarea>-->
<!--                            <br>-->
<!--                            <ul class="nav nav-pills pull-left ">-->
<!--                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="glyphicon glyphicon-bullhorn"></i></a></li>-->
<!--                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class=" glyphicon glyphicon-facetime-video"></i></a></li>-->
<!--                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="glyphicon glyphicon-picture"></i></a></li>-->
<!--                            </ul>-->
<!--                            <button type="submit" class="btn btn-success pull-right"> Share</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <!-- Status Upload  -->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="panel panel-default">-->
<!--                <div class="btn-group pull-right postbtn">-->
<!--                    <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>-->
<!--                    <ul class="dropdown-menu pull-right" role="menu">-->
<!--                        <li><a href="javascript:void(0)">Hide this</a></li>-->
<!--                        <li><a href="javascript:void(0)">Report</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="col-md-12">-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">Lucky Sans<br>-->
<!--                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>-->
<!--
<!--                            <ul class="nav nav-pills pull-left ">-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>-->
<!--                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-12 commentsblock border-top">-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">Astha Smith</h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">Lucky Sans</h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>-->
<!--                            <div class="media">-->
<!--                                <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>-->
<!--                                <div class="media-body">-->
<!--                                    <h4 class="media-heading">Astha Smith</h4>-->
<!--                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="panel panel-default">-->
<!--                <div class="btn-group pull-right postbtn">-->
<!--                    <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>-->
<!--                    <ul class="dropdown-menu pull-right" role="menu">-->
<!--                        <li><a href="javascript:void(0)">Hide this</a></li>-->
<!--                        <li><a href="javascript:void(0)">Report</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="col-md-12">-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading"> Lucky Sans<br>-->
<!--                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>-->
<!--                            <ul class="nav nav-pills pull-left ">-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>-->
<!--                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-12 border-top">-->
<!--                    <div class="status-upload">-->
<!--                        <form>-->
<!--                            <label>Comment</label>-->
<!--                            <textarea class="form-control" placeholder="Comment here"></textarea>-->
<!--                            <br>-->
<!--                            <ul class="nav nav-pills pull-left ">-->
<!--                                <li><a title=""><i class="glyphicon glyphicon-bullhorn"></i></a></li>-->
<!--                                <li><a title=""><i class=" glyphicon glyphicon-facetime-video"></i></a></li>-->
<!--                                <li><a title=""><i class="glyphicon glyphicon-picture"></i></a></li>-->
<!--                            </ul>-->
<!--                            <button type="submit" class="btn btn-success pull-right"> Comment</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <!-- Status Upload  -->
<!--
<!--                </div>-->
<!--            </div>-->
<!--            <div class="panel panel-default">-->
<!--                <div class="btn-group pull-right postbtn">-->
<!--                    <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>-->
<!--                    <ul class="dropdown-menu pull-right" role="menu">-->
<!--                        <li><a href="javascript:void(0)">Hide this</a></li>-->
<!--                        <li><a href="javascript:void(0)">Report</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="col-md-12">-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading"> Lucky Sans<br>-->
<!--                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>-->
<!--                            <ul class="nav nav-pills pull-left ">-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>-->
<!--                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-12 commentsblock border-top">-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">Astha Smith</h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>-->
<!--                            <div class="media">-->
<!--                                <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>-->
<!--                                <div class="media-body">-->
<!--                                    <h4 class="media-heading">Nested Lucky Sans</h4>-->
<!--                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="panel panel-default">-->
<!--                <div class="btn-group pull-right postbtn">-->
<!--                    <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>-->
<!--                    <ul class="dropdown-menu pull-right" role="menu">-->
<!--                        <li><a href="javascript:void(0)">Hide this</a></li>-->
<!--                        <li><a href="javascript:void(0)">Report</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="col-md-12">-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading"> Lucky Sans<br>-->
<!--                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>-->
<!--                            <ul class="nav nav-pills pull-left ">-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>-->
<!--                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="panel panel-default">-->
<!--                <div class="btn-group pull-right postbtn">-->
<!--                    <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>-->
<!--                    <ul class="dropdown-menu pull-right" role="menu">-->
<!--                        <li><a href="javascript:void(0)">Hide this</a></li>-->
<!--                        <li><a href="javascript:void(0)">Report</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="col-md-12">-->
<!--                    <div class="media">-->
<!--                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading"> Lucky Sans<br>-->
<!--                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>-->
<!--                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>-->
<!--                            <ul class="nav nav-pills pull-left ">-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>-->
<!--                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>-->
<!--                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>