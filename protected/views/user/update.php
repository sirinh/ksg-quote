<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->user_sname=>array('view','id'=>$model->id),
	'Правка',
);

if (!Yii::app()->user->isGuest){
$this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
	array('label'=>'Просмотр','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage User','url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin),
    ),
)); }
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>