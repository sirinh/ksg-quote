<div class="view">
        <div id="tools">
        <?php
        if (!Yii::app()->user->isGuest) {
            $this->widget('bootstrap.widgets.BootMenu', array(
                'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
                'stacked' => false, // whether this is a stacked menu
                'items' => array(
                    array('label' => 'Правка', 'url' => array('update', 'id' => $data->category_id)),
                    array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $data->category_id), 'confirm' => 'Are you sure you want to delete this item?')),
                ),
            ));
        }
        ?>
    </div>

	<h2><?php echo CHtml::link(CHtml::encode($data->category_name),array('view','id'=>$data->category_id)); ?></h2>
</div>