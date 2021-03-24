<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\KursRejasi;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kurslar */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kurslars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$kurs_rejasi = KursRejasi::find()->where(['kurs_id' => $id])->all();

?>
<style>
    .accordion {
        background-color: #eee;
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

    .panel {
        padding: 0 18px;
        background-color: gray;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>
<div class="kurslar-view" style="margin-bottom:10%;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'davomiylik',
            'dars_vaqti',
            'oylik_tolov',
            'batafsil:ntext',
        ],
    ]) ?>

    <h3 style="text-align:center">Kurs rejasi:</h3>

  
    <div class="panel-group" id="accordion">
        <?php foreach($kurs_rejasi as $k):?>
        <button class="accordion"><?=$k->title?></button>
        <div class="panel">
            <p><?=$k->batafsil?></p>
        </div>
        <?php endforeach?>    
    </div>
    <a href="<?=Url::to(['/kurs-rejasi/create', 'id' => $id])?>" class="btn btn-success">Kurs rejasini qo'shish</a>

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