<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">
            <?php
            $this->widget('bootstrap.widgets.BootNavbar', array(
                'fixed' => false,
                'brand' => 'KSG-Quote',
                'brandUrl' => Yii::app()->request->baseUrl,
                'collapse' => true, // requires bootstrap-responsive.css
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.BootMenu',
                        'items' => array(
                            array('label' => 'Цитаты', 'url' => array('/quote')),
                            array('label' => 'Категории', 'url' => array('/category')),
                            array('label' => 'Авторы', 'url' => array('/authors')),
                        ),
                    ),
                    array(
                        'class' => 'bootstrap.widgets.BootMenu',
                        'htmlOptions' => array('class' => 'pull-right'),
                        'items' => array(
                            array('label' => Yii::app()->user->name, 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                array('label' => 'Выход (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Профиль', 'url' => array('/user/'.Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                                '---',
                                array('label' => 'Пользователи', 'url' => array('/user'), 'visible' => Yii::app()->user->isAdmin),
                            )),
                            array('label' => 'Войти', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        ),
                    ),
                ),
            ));
            ?>
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?>
            <?php endif ?>


            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by KSG-Quote<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
                <br/>
                <?php $stats = Yii::app()->db->getStats();
                echo 'Количество запросов = '.$stats[0].'<br/>';
                echo 'Время выполнения = '.$stats[1].'<br/>';
                ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
