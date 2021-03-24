<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Xizmatlar */

$this->title = 'Create Xizmatlar';
$this->params['breadcrumbs'][] = ['label' => 'Xizmatlars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xizmatlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
