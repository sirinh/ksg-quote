<?php
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'quote_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'quote_name', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'quote_date', array('class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'quote_text', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'quote_source', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php echo $form->textFieldRow($model, 'category_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'author_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'user_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'create_time', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'update_time', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.BootButton', array(
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
