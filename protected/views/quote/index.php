<?php
$this->breadcrumbs=array(
	'Цитаты',
);
?>
<br/>
<?php 
if (!Yii::app()->user->isGuest){
$this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Добавить цитату', 'url'=>array('create')),
        array('label'=>'Управление', 'url'=>array('admin'),'visible'=>Yii::app()->user->isAdmin),
    ),
)); }
?>
<br/>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
