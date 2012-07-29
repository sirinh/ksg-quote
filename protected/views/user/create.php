<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Новый',
);
if (Yii::app()->user->isAdmin){
$this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'List User','url'=>array('index')),
	array('label'=>'Manage User','url'=>array('admin')),
    ),
)); }

?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>