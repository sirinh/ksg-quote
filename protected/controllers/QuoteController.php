<?php

class QuoteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'users'=>array('@'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'expression' => 'QuoteController::isAuthor( (int)$_GET["id"], Yii::app()->user->id)||$user->isAdmin;',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression' => '($user->isAdmin)',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Quote;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quote']))
		{
			$model->attributes=$_POST['Quote'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->quote_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quote']))
		{
			$model->attributes=$_POST['Quote'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->quote_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])){
                            echo $_POST['returnUrl'];
				$this->redirect(array('quote/index'));}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	/*$this->layout='main';
        $val = Yii::app()->cache->get('quote_index');
        if($val === FALSE) {
            $quote_index_depen = new CDbCacheDependency('SELECT Max(update_time) FROM tbl_quote');
            $dataProvider=new CActiveDataProvider('Quote');
            $val = $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ),TRUE);
            Yii::app()->cache->set('quote_index',$val,10000,$quote_index_depen);
        }
        echo $val;*/	
            
            $dataProvider=new CActiveDataProvider('Quote');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                    'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Quote('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Quote']))
			$model->attributes=$_GET['Quote'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Quote::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='quote-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public static function isAuthor($id, $user_id) 
        {
                $model=Quote::model()->findByPk($id);
                if($user_id == $model->user_id)       { return true; } 
                else                                    { return false;}
        }
}
