<div class="view">
    <div id="tools">
        <?php
        if (!Yii::app()->user->isGuest) {
            $this->widget('bootstrap.widgets.BootMenu', array(
                'type' => 'tabs', // '', 'tabs', 'pills' (or 'list')
                'stacked' => false, // whether this is a stacked menu
                'items' => array(
                    array('label' => 'Правка', 'url' => array('update', 'id' => $data->quote_id)),
                    array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $data->quote_id), 'confirm' => 'Are you sure you want to delete this item?')),
                ),
            ));
        }
        ?>
    </div>

    <div class="quote">
        <div class="title">
            <h1><?php echo CHtml::link(CHtml::encode($data->quote_name), array('view', 'id' => $data->quote_id)); ?></h1>
        </div>
        <br/>
        <div class="content">
            <?php
            $this->beginWidget('CMarkdown', array('purifyOutput' => true));
            echo $data->quote_text;
            $this->endWidget();
            ?>
        </div>
        <div class="author">
            <b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->author->author_name), array('authors/view', 'id' => $data->author_id)); ?><br />
        </div>
        <div class="category">
            <b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->category->category_name), array('category/view', 'id' => $data->category_id)); ?><br />
        </div>
        <div class="qdate">
            <b><?php echo CHtml::encode($data->getAttributeLabel('quote_date')); ?>:</b>
            <?php echo CHtml::encode($data->quote_date); ?><br />
        </div>

    </div>
    <br/>
</div>