<?php
$this->breadcrumbs=array(
	'Цитаты'=>array('index'),
	$model->quote_name=>array('view','id'=>$model->quote_id),
	'Правка',
);
?>

<?php $this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'List Quote','url'=>array('index')),
	array('label'=>'Create Quote','url'=>array('create')),
	array('label'=>'View Quote','url'=>array('view','id'=>$model->quote_id)),
	array('label'=>'Manage Quote','url'=>array('admin')),
    ),
)); ?>
<br/>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>