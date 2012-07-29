<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->user_sname,
);

if (!Yii::app()->user->isGuest){
$this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
       array('label'=>'Список','url'=>array('index'), 'visible'=>Yii::app()->user->isAdmin),
	array('label'=>'Новый','url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin),
	array('label'=>'Правка','url'=>array('update','id'=>$model->id)),
	array('label'=>'Удалить','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->isAdmin),
	array('label'=>'Управление','url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin),
    ),
)); }
?>


<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'user_sname',
		'profile',
            'is_admin',
	),
)); ?>
