<?php

class WebUser extends CWebUser {

    private $_model = null;

    function getisAdmin() {
        if ($user = $this->getModel()) {
            // в таблице User есть поле role
            return $user->is_admin;
        } else {
            return false;
        }
    }

    private function getModel() {
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }

}

?>
