<?php

use yii\helpers\Html;
use common\models\Kurslar;
use yii\widgets\ActiveForm;

$title = Kurslar::findOne(['id'=> $id])->title;
/* @var $this yii\web\View */
/* @var $model common\models\Guruhlar */

$this->title = 'Create Guruhlar';
$this->params['breadcrumbs'][] = ['label' => 'Guruhlars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guruhlar-create">

    <h2><?=$title?> guruh qo'shish</h2>

   <?php $form = ActiveForm::begin();?>
    <?=$form->field($model, 'title')->textInput()->label('Guruh nomi')?>
    <?=$form->field($model, 'dars_vaqti')->textInput()->label("Dars vaqtini ( xx:xx dan xx:xx gacha )ko'rinishda kiriting");?>
    <button class="btn btn-success">save</button>
    <?php ActiveForm::end()?>

</div>
