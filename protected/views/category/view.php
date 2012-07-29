<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	$model->category_name,
);
?>
<?php $this->pageTitle=Yii::app()->name . ' - Категории - ' . $model->category_name ?>
<?php 
if (Yii::app()->user->isAdmin){
$this->widget('bootstrap.widgets.BootMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Список','url'=>array('index')),
	array('label'=>'Добавить','url'=>array('create')),
	array('label'=>'Правка','url'=>array('update','id'=>$model->category_id)),
	array('label'=>'Удалить','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление','url'=>array('admin')),
    ),
)); }
?>

<br/>

<div class="quote">
    <div class="title">
        <h1><?php echo CHtml::encode($model->category_name); ?></h1>
    </div>
</div>

<?php
$criteria = new CDbCriteria;
$criteria->compare('category_id', $model->category_id);
$dataprov = new CActiveDataProvider('Quote', array('criteria' => $criteria,));
$this->widget('bootstrap.widgets.BootListView', array(
    'dataProvider' => $dataprov,
    'itemView' => '_quotes',
));
?>
