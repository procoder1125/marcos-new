<?php

use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Guruhlar;
use yii\widgets\ActiveField;
use yii\web\AssetBundle;
use yii\widgets\MaskedInput;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;



$guruhlar = Guruhlar::find()->where(['kurs_id' => $kurs_id])->all();
$data = [];
foreach ($guruhlar as $guruh) {
    $data[$guruh->dars_vaqti] = $guruh->dars_vaqti;
}
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
    <link rel="shortcut icon" href="/img/ico.png" type="image/png">

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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
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
                <div class="size60 py-4 bold color"><?= $kurs->title ?></div>
                <div class="row mt-5 text-center">
                    <div class="col-12 col-sm-6 col-lg-4 py-2">
                        <div class="info p-3" data-bottom-top="transform:translate(0,120px) scale(0.7)" data-bottom-bottom="transform:translate(0,0px) scale(1);">
                            <div class="size24 color">Davomiyligi</div>
                            <div class="size28 bold"><?= $kurs->davomiylik ?> oy</div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-12 col-sm-6 col-lg-4 py-2">
                        <div class="info p-3" data-bottom-top="transform:translate(0,120px) scale(0.7)" data-bottom-bottom="transform:translate(0,0px) scale(1);">
                            <div class="size24 color">Dars vaqti</div>
                            <div class="size28 bold"><?= $kurs->dars_vaqti ?> soat</div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-12 col-sm-6 col-lg-4 py-2">
                        <div class="info p-3" data-bottom-top="transform:translate(0,120px) scale(0.7)" data-bottom-bottom="transform:translate(0,0px) scale(1);">
                            <div class="size24 color">Oylik to'lov</div>
                            <div class="size28 bold"><?= $kurs->oylik_tolov ?> so'm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form">
            <div class="p-5" style="width: 100%;">
            <?php if(!Yii::$app->user->isGuest):?>
                <div class="size48 pb-4 bold">Ro'yxatdan o'tish</div>
                <form action="<?= Url::to(['/student/signup', 'kurs_id' => $kurs_id]) ?>" method="POST">
                    <?php $form = ActiveForm::begin(); ?>
                    <input type="hidden" id="" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <div class="py-2">
                        <div class="group">
                            <?= $form->field($model, 'fullname')->textInput(['placeholder' => "Ism-familiyangiz"])->label(false) ?>
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="group">
                            <?= $form->field($model, 'phone')->textInput(['placeholder' => "9989x xxx-xx-xx"])->label(false) ?>
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="group">
                            <label for="">Kurs vaqtini tanlang</label>
                            <?= $form->field($model, 'dars_vaqti')->dropDownList($data, ['browser-default custom-select'])->label(false) ?>
                            <!-- <select name="time" required>
                                <option value="11:00 - 13:00">11:00 - 13:00</option>
                                <option value="18:00 - 20:00">18:00 - 20:00</option>
                            </select> -->
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="group">
                            <form method="post">
                                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                <button type="submit" class="myBtn blue">Ro'yxatdan o'tish</button>
                            </form>

                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </form>
            <?php else:?>
                <div class="size48 pb-4 bold">Kursga yozilish uchun ro'yhatdan o'ting</div>
                <div class="py-2">
                        <div class="group">
                            <a type='submit' class="myBtn blue" style="width:100%;" href="<?=Url::to(['/site/signup'])?>">Buyerga bosing</a>

                        </div>
                    </div> 
            <?php endif?>   
            </div>
        </div>
    </div>

    <script src="/libs/particles.js/particles.min.js"></script>
    <script src="/libs/particles.js/demo/js/app.js"></script>
</body>

</html>