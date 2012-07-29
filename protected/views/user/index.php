<?php
$this->breadcrumbs=array(
	'Пользователи',
);
?>
<?php 
if (Yii::app()->user->isAdmin){
$this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Новый', 'url'=>array('create')),
        array('label'=>'Управление', 'url'=>array('admin'),),
    ),
)); }
?>

<h1>Пользователи</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
