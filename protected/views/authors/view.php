<?php
$this->breadcrumbs = array(
    'Авторы' => array('index'),
    $model->author_name,
);
?>
<?php $this->pageTitle=Yii::app()->name . ' - Авторы - ' . $model->author_name ?>
<?php
if (Yii::app()->user->isAdmin) {
    $this->widget('bootstrap.widgets.BootMenu', array(
        'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
        'stacked' => false, // whether this is a stacked menu
        'items' => array(
            array('label' => 'List Authors', 'url' => array('index')),
            array('label' => 'Create Authors', 'url' => array('create')),
            array('label' => 'Update Authors', 'url' => array('update', 'id' => $model->author_id)),
            array('label' => 'Delete Authors', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->author_id), 'confirm' => 'Are you sure you want to delete this item?')),
            array('label' => 'Manage Authors', 'url' => array('admin')),
        ),
    ));
}
?>

<div class="quote">
    <div class="title">
        <h1><?php echo CHtml::encode($model->author_name); ?></h1>
    </div>
    <div class="photo">
<?php //echo CHtml::image(Yii::app()->baseUrl . '/images/authors/' . $model->author_id . $model->author_img, $model->author_name, array('height' => 200));  ?>  
    </div>
    <div class="content">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        echo $model->author_preview . $model->author_desc;
        $this->endWidget();
        ?>
    </div>

</div>

<?php
$criteria = new CDbCriteria;
$criteria->compare('author_id', $model->author_id);
$dataprov = new CActiveDataProvider('Quote', array('criteria' => $criteria,));
$this->widget('bootstrap.widgets.BootListView', array(
    'dataProvider' => $dataprov,
    'itemView' => '_quotes',
));
?>
