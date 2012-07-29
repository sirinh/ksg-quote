<?php

Yii::import('zii.widgets.CPortlet');

class NavSide extends CPortlet {

    public function getCategory() {
        $cats = Category::model()->findAll();
        return $cats;
    }

    protected function renderContent() {
        $models = $this->getCategory();
        $itemm = array(
            array('label' => 'НАВИГАЦИЯ'),
            array('label' => 'Home', 'icon' => 'home', 'url' => Yii::app()->request->baseUrl),
            array('label' => 'Цитаты', 'icon' => 'book', 'url' => array('/quote')),
            array('label' => 'Авторы', 'icon' => 'pencil', 'url' => array('/authors')),
            array('label' => 'КАТЕГОРИИ'),);
        $items = array();
        foreach ($models as $model) {
            $items[] = array('label' => $model->category_name, 'icon' => 'cog', 'url' => array('category/view', 'id' => $model->category_id));
        }
        $itemall = array();
        $itemall = array_merge($itemm, $items);
        $this->widget('bootstrap.widgets.BootMenu', array(
            'type' => 'list',
            'items' => $itemall));
    }

}

?>
