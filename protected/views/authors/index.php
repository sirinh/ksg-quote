<?php
$this->breadcrumbs=array(
	'Авторы',
);
?>
<?php 
if (Yii::app()->user->isAdmin){
$this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Добавить','url'=>array('create')),
	array('label'=>'Управление','url'=>array('admin')),
    ),
)); }
?>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
