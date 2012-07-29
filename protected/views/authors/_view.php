<div class="view">
    <div id="tools">
        <?php
        if (!Yii::app()->user->isGuest) {
            $this->widget('bootstrap.widgets.BootMenu', array(
                'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
                'stacked' => false, // whether this is a stacked menu
                'items' => array(
                    array('label' => 'Правка', 'url' => array('update', 'id' => $data->author_id)),
                    array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $data->author_id), 'confirm' => 'Are you sure you want to delete this item?')),
                ),
            ));
        }
        ?>
    </div>
    <div class="quote">
        <div class="title">
            <h1><?php echo CHtml::link(CHtml::encode($data->author_name), array('view', 'id' => $data->author_id)); ?></h1>
        </div>
        <div class="photo">
<?php //echo CHtml::image(Yii::app()->baseUrl . '/images/authors/' . $data->author_id . $data->author_img, $data->author_name, array('height' => 200));  ?>  
        </div>
        <div class="content">
            <?php
            $this->beginWidget('CMarkdown', array('purifyOutput' => true));
            echo $data->author_preview;
            $this->endWidget();
            ?>
        </div>

    </div>

</div>