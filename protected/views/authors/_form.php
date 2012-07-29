<?php
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id' => 'authors-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'author_name', array('class' => 'span5', 'maxlength' => 250)); ?>

<?php //echo $form->textFieldRow($model,'author_preview',array('class'=>'span5','maxlength'=>300)); ?>
<?php
$this->widget('application.extensions.ckeditor.CKEditor', array(
    'model' => $model,
    'attribute' => 'author_preview',
    'language' => 'ru',
    'editorTemplate' => 'full',
    'options'=>array(
            'filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('authors/browse')),
        ),
));
?>
<br/>
<?php
$this->widget('application.extensions.ckeditor.CKEditor', array(
    'model' => $model,
    'attribute' => 'author_desc',
    'language' => 'ru',
    'editorTemplate' => 'full',
        'options'=>array(
            'filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('authors/browse')),
        ),
));
?>
    <?php /*echo $form->textFieldRow($model, 'author_img', array('class' => 'span5', 'maxlength' => 250)); 
echo $form->labelEx($model,'author_img');
echo $form->fileField($model, 'author_img');
echo $form->error($model,'author_img');
if(!$model->isNewRecord) {
    echo CHtml::image(Yii::app()->baseUrl.'/images/authors/' .$model->author_id . $model->author_img, $model->author_name, array('height'=>100));
}*/?>

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
