<?php

/* @var $this yii\web\View */

$this->title = 'Панель Администратора';
\app\assets\AdminAsset::register($this);
?>

        <div class="col-sm-12 col-md-12 well" id="content">
            <h1>Welcom admin</h1>
        </div>

       <div>
           <ul class="nav navbar-nav maincontent">
               <li>
                   <a href="/students/create"><i class="fa fa-fw fa-user-plus"></i> ДОБАВИТЬ СТУДЕНТА</a>
               </li>
               <li>
                   <a href="/groups/create"><i class="fa fa-fw fa-group"></i> ДОБАВИТЬ ГРУППУ</a>
               </li>
               <li>
                   <a href="/teachers/create"><i class="fa fa-fw fa fa-pencil"></i> ДОБАВИТЬ ПРЕПАДОВАТЕЛЯ</a>
               </li>

               <li>
                   <a href="/responsible/create"><i class="fa fa-fw fa fa-plus"></i> ДОБАВИТЬ ОТВЕТСТВЕННОГО</a>
               </li>
           </ul>
       </div>

