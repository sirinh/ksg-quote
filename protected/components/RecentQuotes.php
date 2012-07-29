<?php

Yii::import('zii.widgets.CPortlet');

class RecentQuotes extends CPortlet {

    //public $title = 'Последние цитаты';
    protected function renderContent() {
        $dataProvider = new CActiveDataProvider('Quote',
                        array(
                            'criteria' => array(
                                'order' => 'create_time DESC',
                                'limit' => 5,
                            ),
                            'pagination' => false
                        )
        );
        $this->widget('bootstrap.widgets.BootListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => 'recentQuotes',
        ));
    }

}

?>
