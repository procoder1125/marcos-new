<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6C52C8">
    <title>Ro'yxatdan o'tish</title>
    <meta name="desc" content="Marcos soft xizmatlar">
    <meta name="keywords" content="Web, Development, Marcos uz, Marcos soft, Mobile Development, Web Development, Web sayt, Sayt yaratish">
    <link rel="shortcut icon" href="img/ico.png" type="image/png">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141314474-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-141314474-1');
    </script>

    <script src="libs/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div class="register clear">

        <div id="particles-js" class="absolute full zIndex-1"></div>
        <div class="back"></div>
        <div class="content">
            <div class="p-5 text-center" style="width: 100%">
                <a href="/">
                    <img src="/img/logo.png" style="max-width: 200px;" alt="logo">
                </a>

            </div>
        </div>
        <div class="form">
            <div class="p-5" style="width: 100%;">
                <div class="size48 pb-4 bold">BIZGA MUROJAT</div>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <div class="py-2">
                    <div class="group">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    </div>
                </div>
                <div class="py-2">
                    <div class="group">
                    <?= $form->field($model, 'email') ?>
                    </div>
                </div>
                <div class="py-2">
                    <div class="group">
                    <?= $form->field($model, 'subject') ?>
                    </div>
                </div>
                <div class="py-2">
                    <div class="group">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
                <div class="py-2">
                    <div class="group">
                    <?= $form->field($model, 'verification_code')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                    </div>
                </div>
                
                <div class="py-2">
                    <div class="group">        
                        <button type="submit" class="myBtn blue">Jo'natish</button>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

    <script src="libs/particles.js/particles.min.js"></script>
    <script src="libs/particles.js/demo/js/app.js"></script>
</body>

</html>


