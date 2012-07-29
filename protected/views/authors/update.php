<?php
$this->breadcrumbs=array(
	'Авторы'=>array('index'),
	$model->author_name=>array('view','id'=>$model->author_id),
	'Правка',
);

$this->menu=array(
	array('label'=>'List Authors','url'=>array('index')),
	array('label'=>'Create Authors','url'=>array('create')),
	array('label'=>'View Authors','url'=>array('view','id'=>$model->author_id)),
	array('label'=>'Manage Authors','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>