<?php
$this->breadcrumbs = array(
    'Цитаты' => array('index'),
    $model->quote_name,
);
?>
<?php
if (!Yii::app()->user->isGuest) {
    $this->widget('bootstrap.widgets.BootMenu', array(
        'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
        'stacked' => false, // whether this is a stacked menu
        'items' => array(
            array('label' => 'Список', 'url' => array('index')),
            array('label' => 'Добавить цитату', 'url' => array('create')),
            array('label' => 'Правка цитаты', 'url' => array('update', 'id' => $model->quote_id)),
            array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->quote_id), 'confirm' => 'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->isAdmin),
            array('label' => 'Управление', 'url' => array('admin'), 'visible'=>Yii::app()->user->isAdmin),
        ),
    ));
}
?>

<div class="quote">
        <div class="title">
        <h1><?php echo CHtml::encode($model->quote_name); ?></h1>
    </div>
<br/>
    <div class="content">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        echo $model->quote_text;
        $this->endWidget();
        ?>
    </div>
    <div class="author">
        <b><?php echo CHtml::encode($model->getAttributeLabel('author_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($model->author->author_name), array('authors/view', 'id' => $model->author_id)); ?><br />
    </div>
    <div class="category">
        <b><?php echo CHtml::encode($model->getAttributeLabel('category_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($model->category->category_name), array('category/view', 'id' => $model->category_id)); ?><br />
    </div>
    <div class="qdate">
        <b><?php echo CHtml::encode($model->getAttributeLabel('quote_date')); ?>:</b>
        <?php echo CHtml::encode($model->quote_date); ?><br />
    </div>
    
</div>
