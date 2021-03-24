<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KursRejasi */

$this->title = 'Update Kurs Rejasi: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kurs Rejasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kurs-rejasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
