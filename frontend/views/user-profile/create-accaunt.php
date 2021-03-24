<?php

use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\UserProfile;
use common\models\Student;

$first = UserProfile::findOne(['user_id' => Yii::$app->user->identity])->name;
$last =  UserProfile::findOne(['user_id' => Yii::$app->user->identity])->surname;
$cours =  UserProfile::findOne(['user_id' => Yii::$app->user->identity])->surname;
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
</head>

<body>
    <div class="register clear">

        <div id="particles-js" class="absolute full zIndex-1"></div>
        <div class="back"></div>
        <div class="content" style="margin-left:50px;">
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        
                        <th scope="col">1 . ISMI</th>
                        <td scope="col"><?php echo $ism = isset($first) ? $first :  'Ismingiz hali kiritilmagan !!!';?></td>
                        <th scope="col">KURS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">2 . FAMILIYA</th>
                        <td scope="col"><?php echo $fam = isset($last) ? $last :  'Familiyangiz hali kiritilmagan !!!';?></td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">3 . KURS</th>
                        <td scope="col"><?php echo $kurs = isset($cours) ? $cours :  'Kurs hali kiritilmagan !!!';?></td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">4 . GURUH</th>
                        <td scope="col"><?php echo $guruh = isset($group) ? $group :  'Guruh hali kiritilmagan !!!';?></td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            <!-- <div class="p-5 text-center" style="width: 100%">
                <a href="/">
                    <img src="/img/logo.png" style="max-width: 200px;" alt="logo">
                </a>


            </div> -->
        </div>


    </div>

    <script src="libs/particles.js/particles.min.js"></script>
    <script src="libs/particles.js/demo/js/app.js"></script>
</body>

</html>