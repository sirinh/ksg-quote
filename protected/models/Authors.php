<?php

/**
 * This is the model class for table "tbl_authors".
 *
 * The followings are the available columns in table 'tbl_authors':
 * @property integer $author_id
 * @property string $author_name
 * @property string $author_preview
 * @property string $author_desc
 * @property string $author_img
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Quote[] $quotes
 */
class Authors extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Authors the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{authors}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('author_preview, author_desc', 'required'),
            array('create_time, update_time, user_id', 'numerical', 'integerOnly' => true),
            array('author_name, author_img', 'length', 'max' => 250),
            array('author_img', 'unsafe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('author_id, author_name, author_preview, author_desc, author_img, create_time, update_time, user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'quotes' => array(self::HAS_MANY, 'Quote', 'author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'author_id' => 'Author',
            'author_name' => 'Автор',
            'author_preview' => 'Биография',
            'author_desc' => 'Биография далее',
            'author_img' => 'Фото',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'user_id' => 'User',
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

        $criteria->compare('author_id', $this->author_id);
        $criteria->compare('author_name', $this->author_name, true);
        $criteria->compare('author_preview', $this->author_preview, true);
        $criteria->compare('author_desc', $this->author_desc, true);
        $criteria->compare('author_img', $this->author_img, true);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('user_id', $this->user_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
                $this->user_id = Yii::app()->user->id;
            } else {
                $this->update_time = time();
            }
            return true;
        }
        else
            return false;
    }

}