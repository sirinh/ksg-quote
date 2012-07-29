<?php

class AuthorsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'browse', 'upload'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'expression' => '($user->isAdmin)',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Authors;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Authors'])) {
            $model->attributes = $_POST['Authors'];
            $file_image = CUploadedFile::getInstance($model, 'author_img');
            if (is_object($file_image) && get_class($file_image) === 'CUploadedFile')
                $model->author_img = $file_image;
            if ($model->save()) {
                if (is_object($file_image)) {
                    $model->author_img->saveAs($_SERVER['DOCUMENT_ROOT'] . '/yiiquote/images/authors/' . $model->author_id . $model->author_img);
                }
                $this->redirect(array('view', 'id' => $model->author_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Authors'])) {
            $model->attributes = $_POST['Authors'];
            $file_image = CUploadedFile::getInstance($model, 'author_img');
            if (is_object($file_image) && get_class($file_image) === 'CUploadedFile')
                $model->author_img = $file_image;
            if ($model->save()) {
                if (is_object($file_image)) {
                    $model->author_img->saveAs($_SERVER['DOCUMENT_ROOT'] . '/yiiquote/images/authors/' . $model->author_id . $model->author_img);
                }
                $this->redirect(array('view', 'id' => $model->author_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Authors');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Authors('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Authors']))
            $model->attributes = $_GET['Authors'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUpload() {

        $callback = $_GET['CKEditorFuncNum'];
        $file_name = $_FILES['upload']['name'];
        $file_name_tmp = $_FILES['upload']['tmp_name'];
        $file_new_name = Yii::getPathOfAlias('webroot') . '/images/';
        $full_path = $file_new_name . $file_name;
        $http_path = Yii::app()->request->baseUrl . '/images/' . $file_name;
        $error = '';
        if (move_uploaded_file($file_name_tmp, $full_path)) {
            
        } else {
            $error = 'Some error occured please try again later';
            $http_path = '';
        }
        echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(" . $callback . ",  \"" . $http_path . "\", \"" . $error . "\" );</script>";
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Authors::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'authors-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actions() {
        return array(
            'fileManager' => array(
                'class' => 'application.extensions.elfinder.ElFinderAction',
            ),
        );
    }

    public function actionBrowse() {
        // я создал специально отдельный пустой лейаут
        $this->layout = '//layouts/clear';
        $this->render('browser');
    }

}
