<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Kurslar;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $se
archModel common\models\KursRejasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kurs Rejasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .accordion {
        background-color: #b3ccff;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active,
    .accordion:hover {
        background-color: #ccc;
    }
    .accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}
    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color:#ffffcc ;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>
<div class="kurs-rejasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kurs Rejasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="panel-group" id="accordion">
        <?php foreach ($kurs_rejasi as $k) : ?>
            <button class="accordion"><?= Kurslar::findOne(['id' => $k->kurs_id])->title ?></button>
          
                <div class="row panel">
                    <div class="col-lg-10 col-md-10 col-xl-10"><p><?= $k->batafsil ?></p></div>
                    <div class="col-lg-2 col-md-2 col-xl-2" style="text-align: center;">
                     <a href="<?=Url::to(['/kurs-rejasi/view', 'id'=>$k->id])?>" style="margin-right: 10px;"><i class="fa fa-eye" style="font-size:15px;"></i></a>
                     <a href="<?=Url::to(['/kurs-rejasi/update', 'id'=>$k->id])?>" style="margin-right: 10px;"><i class="fa fa-eyedropper" style="font-size:15px;"></i></a>
                     <a href="<?=Url::to(['/kurs-rejasi/delete', 'id'=>$k->id])?>" data-method="post" data-confirm="O'chirishni xohlaysizmi ???" style="margin-right: 10px;"><i class="fa fa-trash" style="font-size:15px;"></i></a>   </div>
                </div>
                
        <?php endforeach ?>
    </div>


</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>