<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $user_sname
 * @property string $email
 * @property string $profile
 * @property integer $is_admin
 *
 * The followings are the available model relations:
 * @property Quote[] $quotes
 */
class User extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, email', 'required'),
            array('username, password, salt, email', 'length', 'max' => 128),
            array('profile', 'safe'),
            array('user_sname', 'length', 'max'=>30),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password, email, user_sname, profile, is_admin', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'quotes' => array(self::HAS_MANY, 'Quote', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'salt' => 'Соль',
            'user_sname' => 'Видимое имя',
            'email' => 'Email',
            'profile' => 'Примечание',
            'is_admin' => 'Администратор',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('user_sname',$this->user_sname,true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('profile', $this->profile, true);
        $criteria->compare('is_admin',$this->is_admin);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function validatePassword($password) {
        return $this->hashPassword($password, $this->salt) === $this->password;
    }

    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    public function afterValidate() {
        //if ($this->isNewRecord) {
            $salt = self::randomSalt();
            $this->password = self::hashPassword($this->password, $salt);
            $this->salt = $salt;
            $this->is_admin = 0;
       // }
        return true;
    }

    // Генерация "соли". Этот метод генерирует случайным образом слово
    // заданной длины. Длина указывается в единственном свойстве метода.
    // Символы, применяемые при генерации, указаны в переменной $chars.
    // По умолчанию, длина соли 32 символа.
    // Спасибо Тимлар!!!
    public function randomSalt($length = 32) {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double) microtime() * 1000000);
        $i = 1;
        $salt = '';

        while ($i <= $length) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $salt .= $tmp;
            $i++;
        }
        return $salt;
    }

}