<div class="view">

	<h1><?php echo CHtml::link(CHtml::encode($data->quote_name),array('view','id'=>$data->quote_id)); ?></h1>
	<br />

	<?php echo $data->quote_text; ?>
	<br />
        <br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('quote_source')); ?>:</b>
	<?php echo CHtml::encode($data->quote_source); ?>
        <br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->category->category_name), array('category/view', 'id' => $data->category_id)); ?><br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('quote_date')); ?>:</b>
	<?php echo CHtml::encode($data->quote_date); ?><br />

</div>