<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kurslar */

$this->title = 'Create Kurslar';
$this->params['breadcrumbs'][] = ['label' => 'Kurslars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kurslar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
