<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>128)); ?>
        
        <?php echo $form->textFieldRow($model,'user_sname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textAreaRow($model,'profile',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
        
        <?php if (Yii::app()->user->isAdmin) {
            echo $form->checkBoxRow($model,'is_admin'); 
            }?>
        

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
