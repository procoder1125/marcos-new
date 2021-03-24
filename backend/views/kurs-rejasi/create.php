<?php

use yii\helpers\Html;
use common\models\Kurslar;
use yii\widgets\ActiveForm;

$kurslar = Kurslar::find()->all();
$data = [];
foreach($kurslar as $kurs){
    $data[$kurs->id] = $kurs->title;
}

/* @var $this yii\web\View */
/* @var $model common\models\KursRejasi */

$this->title = 'Create Kurs Rejasi';
$this->params['breadcrumbs'][] = ['label' => 'Kurs Rejasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kurs-rejasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin();?>
        <?=$form->field($model, 'title')->textInput()?>
       
        <?=$form->field($model, 'batafsil')->textarea()?>

        <button class="btn btn-success"> Qo'shish</button>
    <?php ActiveForm::end()?>

</div>
