<?php
$this->breadcrumbs=array(
	'Авторы'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'List Authors','url'=>array('index')),
	array('label'=>'Manage Authors','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>