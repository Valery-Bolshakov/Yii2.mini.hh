<!-- Создаем новый шаблон для будущего сайта. Базовый шаблон main менять не будем, что бы можно было
вытягивать от туда что то полезное -->
<!--  -->

<?php
// подключаем необходимый комплект ресурсов

use app\assets\AppAsset;
use yii\helpers\Html;

//метод register класса AppAsset регистрирует пакет ресурсов расположенных в файле app\assets\AppAsset
AppAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<!-- выведем через контейнер язык приложения -->
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <!-- защита от csrf атак -->
    <?php $this->registerCsrfMetaTags() ?>
    <!-- импортируем клас helper\Html. Вызываем метод encode с параметром title.
     encode - защищает от каких то атак при получании данных от пользователя
     И свойством title получаем возможность задавать title на разных видах.-->
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>
<?php //debug(Yii::$app->homeUrl) ?>
<div class="main-wrapper">
    <header class="header">
        <div class="container">
            <nav class="navbar navigation">
                <!--  обратимся к хелпер юрл и методу home-->
                <a class="navbar-brand" href="<?= \yii\helpers\Url::home() ?>"><img src="/images/logo.svg" alt="Logo">
                </a>
                <div class="header__login header__login-mobile">
                </div>
                <ul class="navigation-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= \yii\helpers\Url::to(['home/resume-view']) ?>">Резюме</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= \yii\helpers\Url::to(['home/my-resume']) ?>">Мои резюме</a>
                    </li>
                </ul>
                <div class="navigation-menu__mobile">
                    <ul class="navigation-menu__mobile-nav">
                        <div class="navigation-menu__mobile-nav-top">
                            <li class="navigation-menu__mobile-nav-item active">
                                <a class="nav-link" href="#">Резюме</a>
                            </li>
                            <li class="navigation-menu__mobile-nav-item">
                                <a class="nav-link" href="#">Мои резюме</a>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="navigation-toggler">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </nav>
        </div>
    </header>

    <?= $content; ?>

    <footer class="footer">
        <div class="container">
            <div class="footer__wrap">
                <div class="row">
                    <div class="footer__col footer__policy col-lg-3 col-md-12 p-rel">
                        <a class="footer__logo" href="#"><img src="/images/logo.svg" alt="Logo"></a>
                        <div class="footer__soc-icon">
                            <a href="#"><img src="/images/vk.png" alt="vk"></a>
                            <a href="#"><img src="/images/facebook.png" alt="facebook"></a>
                            <a href="#"><img src="/images/twitter.png" alt="twitter"></a>
                            <a href="#"><img src="/images/instagram.png" alt="instagram"></a>
                        </div>
                        <ul class="footer__ul-policy">
                            <li><a href="#">Все права защищены</a></li>
                            <li><a href="#">Политика конфиденциальности</a></li>
                            <li><a href="#">Правила и условия</a></li>
                        </ul>
                    </div>
                    <div class="footer__col col-lg-3 col-md-12">
                        <ul class="footer__ul">
                            <li><a href="#">Компаниям</a></li>
                            <li><a href="#">О компании</a></li>
                            <li><a href="#">Наши вакансии</a></li>
                            <li><a href="#">Защита персональных данных</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li><a href="#">Помощь</a></li>
                            <li><a href="#">Инвесторам</a></li>
                            <li><a href="#">Партнерам</a></li>
                        </ul>
                    </div>
                    <div class="footer__col col-lg-3 col-md-12">
                        <ul class="footer__ul">
                            <li><a href="#">Соискателям</a></li>
                            <li><a href="#">Готовое резюме</a></li>
                            <li><a href="#">Продвижение резюме</a></li>
                            <li><a href="#">Карьерный консультант</a></li>
                            <li><a href="#">Автоподнятие резюме</a></li>
                            <li><a href="#">Профориентация</a></li>
                            <li><a href="#">Рассылка в агенства</a></li>
                        </ul>
                    </div>
                    <div class="footer__col col-lg-3 col-md-12">
                        <ul class="footer__ul">
                            <li><a href="#">Работодателям</a></li>
                            <li><a href="#">База резюме</a></li>
                            <li><a href="#">Кабинет для работодателя</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>