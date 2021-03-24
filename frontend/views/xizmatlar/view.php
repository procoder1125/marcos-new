<?php

use common\models\KursRejasi;
use yii\helpers\Url;

$kurs_rejasi = KursRejasi::find()->where(['kurs_id' => $id])->all();


?>

<!doctype html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6C52C8">
    <title>Back End Development</title>
    <meta name="desc" content="Marcos soft xizmatlar">
    <meta name="keywords" content="Web, Development, Marcos uz, Marcos soft, Mobile Development, Web Development, Web sayt, Sayt yaratish">
    
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

    <script src="/libs/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div class="preloader flex-center">
        <div class='threedotloader'>
            <div class='dot'></div>
            <div class='dot'></div>
            <div class='dot'></div>
        </div>
    </div>
    <nav>
        <div class="container">
            <a href="/" class="logo float-left">
                <img src="/img/logo.png" alt="MOBIUS - Creative Marketing Solutions">
            </a>
            <div class="float-right myCollapse">
                <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="60" height="50" onclick="this.classList.toggle('active')">
                    <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                    <path class="line middle" d="m 70,50 h -40" />
                    <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
                </svg>
            </div>

            <ul class="menu float-right size18 list-unstyled">
                <li>
                    <a href="/site/about" class="slide-horizontal title-slide-in" data-splitting>BIZ HAQIMIZDA</a>
                </li>
                <li>
                    <a href="/xizmatlar/view" class="slide-horizontal title-slide-in" data-splitting>XIZMATLAR</a>
                </li>
                <li>
                    <a href="/portfolio" class="slide-horizontal title-slide-in" data-splitting>PORTFOLIO</a>
                </li>
                <li>
                    <a href="/news" class="slide-horizontal title-slide-in" data-splitting>YANGILIKLAR</a>
                </li>
                <li>
                    <a href="/site/contact" class="slide-horizontal title-slide-in" data-splitting>ALOQA</a>
                </li>
                <?php if (Yii::$app->user->isGuest) : ?>
                    <li>
                        <a href="<?= Url::to(['/site/login']) ?>" class="slide-horizontal title-slide-in" data-splitting> LOGIN
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/site/signup']) ?>" class="slide-horizontal title-slide-in" data-splitting>REGISTRATSIYA</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= Url::to(['/student/signup']) ?>" class="slide-horizontal title-slide-in" data-splitting>AKKAUNT</a>
                        <a href="<?= Url::to(['/site/logout']) ?>" class="slide-horizontal title-slide-in" data-method="POST" data-splitting>LOG OUT</a>
                    </li>
                <?php endif ?>
                <li>
                    <a href="#" class="slide-horizontal title-slide-in" data-splitting>Tel: 90 316-9555</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div id="scrollr-body" class="hidden">
        <header class="py-5 relative flex-center">
            <div class="back"></div>
            <div class="container py-5">
                <div class="relative text-center">
                    <div class="size48 semibold mb-3 title-slide-in" data-splitting>
                    <?php if(is_object($model) ):?>
                        <?= $model->title ?>
                    <?php endif?>    
                        <div class="pt-3">
                            <a href="<?=Url::to('/site/signup')?>" class="myBtn blue">Ro'yxatdan o'tish</a>
                        </div>

                    </div>
                    <div class="social text-center size18">
                        <a class="facebook" href="#" target="_blank">
                            <i class="ion-social-facebook"></i>
                            <div class="title">FACEBOOK</div>
                        </a>
                        <a class="instagram" href="#" target="_blank">
                            <i class="ion-social-instagram"></i>
                            <div class="title">INSTAGRAM</div>
                        </a>
                        <a class="youtube" href="#" target="_blank">
                            <i class="ion-social-youtube"></i>
                            <div class="title">YOUTUBE</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="down absolute white size36">
                <span class="ion-ios-arrow-down"></span>
                <span class="ion-ios-arrow-down"></span>
                <span class="ion-ios-arrow-down"></span>
            </div>
            <div id="particles-js" class="absolute full zIndex-1"></div>
        </header>

        <div class="content relative">

            <div class="coursePage pt-5">
                <div class="container py-5">
                    <div class="paragraph pb-3 text-center" data-bottom-top="transform:translate(0,120px) scale(0.7)" data-bottom-bottom="transform:translate(0,0px) scale(1);">
                    <?php if(is_object($model) ):?><div class="size48 title wow fadeInUp"><?=$model->title?> Xizmatlari</div><?php endif?>
                    </div>
                    <?php if(is_object($model) ):?><div class="mt-3"><?= $model->batafsil ?></div> <?php endif?>
                    <div class="mt-5 text-center">
                        <a href="#" class="myBtn blue">Bizga murojat</a>
                    </div>

                </div>
            </div>

            <div class="back"></div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M761.9,40.6L643.1,24L333.9,93.8L0.1,1H0v99h1000V1" />
            </svg>
        </div>

        <div class="sendForm banner pt-3">
            <div class="container pt-5 pb-5">
                <div class="banner-box">
                    <div class="b-img" style="background-image:url(/img/banner.jpg)"></div>
                    <div class="size60 bold">Dasturlash, dizayn va xorijiy tillar akademiyasi</div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3
            c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3
            c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z" />
            </svg>
        </div>
        <footer>
            <div class="container text-center pb-5">
                <img src="/img/note8.png" alt="Galaxy Note 8" data-bottom-top="transform:translate(300px,0) rotate(90deg)" data-center-top="transform:translate(0px,0) rotate(0deg)">
                <div class="text-center">
                    <img src="/img/logo.png" alt="Marcos">
                </div>
                <div class="row py-5">
                    <div class="col-12 col-sm-6 col-md-4 py-2">
                        <div class="size20 semibold">Telefon</div>
                        <div class="pt-2">
                            <a href="#" class="text-secondary">+99838253234</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 py-2">
                        <div class="size20 semibold">Ijtimoiy sahifalarimiz</div>
                        <div class="pt-2">
                            <a href="#">
                                <img src="/img/fs.png" alt="Facebook">
                            </a>
                            <a href="#">
                                <img src="/img/ins.png" alt="Instagram">
                            </a>
                            <a href="#">
                                <img src="/img/yt.png" alt="Youtube">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 py-2">
                        <div class="size20 semibold">Manzil</div>
                        <div class="pt-2 text-secondary">
                            <div>Toshkent, Mustaqillik ko'chasi</div>
                        </div>
                    </div>
                </div>
                <div>
                    <span id="year"></span> &copy; <q>Marcos Soft</q>. Barcha huquqlar himoyalangan.
                </div>
            </div>
        </footer>
    </div>

    <div class="overlay"></div>


    <script src="libs/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="libs/Waves-master/dist/waves.min.js"></script>
    <script src="libs/owlcarousel/owl.carousel.min.js"></script>
    <script src="libs/splitting.js"></script>
    <script src="libs/wow/wow.min.js"></script>
    <script src="libs/skrollr.min.js"></script>
    <script src="libs/particles.js/particles.min.js"></script>
    <script src="libs/particles.js/demo/js/app.js"></script>
    <script src="js/script.js"></script>
    <script src="js/ribbon.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.preloader').delay(1000).fadeOut(500, function() {
                Splitting();
            });
        })
    </script>
</body>

</html>