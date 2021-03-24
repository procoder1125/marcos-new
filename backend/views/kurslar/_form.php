<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kurslar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kurslar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'davomiylik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dars_vaqti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oylik_tolov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batafsil')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
