<?php $this->pageTitle = Yii::app()->name; ?>

<?php
$this->beginWidget('bootstrap.widgets.BootHero', array(
    'heading' => 'KSG-Quote v.'.Yii::app()->params['version'].' - Цитатник' ,
));
?>

<?php Yii::app()->params['version'];?>

<?php $this->endWidget(); ?>

<?php
$this->widget('RecentQuotes');
?>
