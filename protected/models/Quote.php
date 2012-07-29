<?php

/**
 * This is the model class for table "tbl_quote".
 *
 * The followings are the available columns in table 'tbl_quote':
 * @property integer $quote_id
 * @property string $quote_name
 * @property integer $quote_date
 * @property string $quote_text
 * @property string $quote_source
 * @property integer $category_id
 * @property integer $author_id
 * @property integer $user_id
 * @property integer $create_time
 * @property integer $update_time
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Authors $author
 * @property Category $category
 */
class Quote extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Quote the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{quote}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('quote_name, quote_date, quote_text', 'required'),
            array('category_id, author_id, user_id, create_time, update_time', 'numerical', 'integerOnly' => true),
            array('quote_name', 'length', 'max' => 100),
            array('quote_source', 'length', 'max'=>200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('quote_id, quote_name, quote_date, quote_text, quote_source, category_id, author_id, user_id, create_time, update_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'author' => array(self::BELONGS_TO, 'Authors', 'author_id'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'quote_id' => 'Код цитаты',
            'quote_name' => 'Название',
            'quote_date' => 'Дата',
            'quote_text' => 'Цитата',
            'quote_source' => 'Источник',
            'category_id' => 'Категория',
            'author_id' => 'Автор',
            'user_id' => 'User',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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

        $criteria->compare('quote_id', $this->quote_id);
        $criteria->compare('quote_name', $this->quote_name, true);
        $criteria->compare('quote_date', $this->quote_date);
        $criteria->compare('quote_text', $this->quote_text, true);
        $criteria->compare('quote_source',$this->quote_source,true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('author_id', $this->author_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
                $this->user_id = Yii::app()->user->id;
                $this->quote_date = strtotime($this->quote_date);
            } else {
                $this->update_time = time();
                $this->quote_date = strtotime($this->quote_date);
            }
            return true;
        }
        else
            return false;
    }

    protected function afterFind() {
        $date = date('d.m.Y', $this->quote_date);
        $this->quote_date = $date;
        parent::afterFind();
    }
    
    public function findRecentQuotes($limit=10)
    {
        return $this->findAll(array(
            'order'=>'t.create_time DESC',
            'limit'=>$limit,
        ));
    }

}