<?php
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id' => 'quote-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'quote_name', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->labelEx($model, 'quote_date'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'quote_date',
    'model' => $model,
    'attribute' => 'quote_date',
    'language' => 'ru',
    'options' => array(
        'showAnim' => 'fold',
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;'
    ),
));
?>

<?php $this->widget('application.extensions.ckeditor.CKEditor', array(
'model'=>$model,
'attribute'=>'quote_text',
'language'=>'ru',
'editorTemplate'=>'full',
)); ?>

<?php echo $form->textFieldRow($model,'quote_source',array('class'=>'span5','maxlength'=>200)); ?>
<?php echo $form->dropDownListRow($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'category_id', 'category_name')); ?>
    <?php echo $form->dropDownListRow($model, 'author_id', CHtml::listData(Authors::model()->findAll(), 'author_id', 'author_name')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.BootButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
