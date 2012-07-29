<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	$model->category_name=>array('view','id'=>$model->category_id),
	'Правка',
);
?>
<?php $this->pageTitle=Yii::app()->name . ' - Категории - ' . $model->category_name . ' - Правка' ?>
<?php $this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'List Category','url'=>array('index')),
	array('label'=>'Create Category','url'=>array('create')),
	array('label'=>'View Category','url'=>array('view','id'=>$model->category_id)),
	array('label'=>'Manage Category','url'=>array('admin')),
    ),
)); ?>

<br/>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>