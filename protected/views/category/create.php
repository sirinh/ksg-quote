<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Добавить',
);
?>
<?php $this->pageTitle=Yii::app()->name . ' - Категории - Новая' ?>
<?php $this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Список','url'=>array('index')),
	array('label'=>'Управление','url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin),
    ),
)); ?>

<br/>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>