<?php

class GuestController extends GxController {

    public $layout = '//layouts/column1';
    
    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view','create', 'update', 'upload'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'users' => array('rcc_editor'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Guest'),
        ));
    }

    public function actionCreate() {
        $model = new Guest;


        if (isset($_POST['Guest'])) {
			
            $model->setAttributes($_POST['Guest']);
            $model->setAttribute('date_of_birth', CDateTimeParser::parse($model->date_of_birth, Yii::app()->params->dateFormat['long']));
			

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->guest_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Guest');


        if (isset($_POST['Guest'])) {
			
			
            $model->setAttributes($_POST['Guest']);
            $model->setAttribute('date_of_birth', CDateTimeParser::parse($model->date_of_birth, Yii::app()->params->dateFormat['long']));
			
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->guest_id));
            }
        }

   
          $itineraryRoomType_Model = ItineraryRoomType::model()->with('rt')->find(
          array(
          //'condition' => 'language="' . Yii::app()->params->language . '"',
          'condition' => 't.irt_id="' . $model->irt_id . '"',
          'limit' => 1
          )); 
     /*
        $model_ItineraryRoomType = ItineraryRoomType::model();
        $criteria = new CDbCriteria;
        $criteria->compare('irt_id', $model->irt_id);
        $criteria->with = array('rt');

        $itineraryRoomType_Model = new CActiveDataProvider(
                get_class($model_ItineraryRoomType), array(
            'criteria' => $criteria,
                )
        );*/

        //CVarDumper::dump($itineraryRoomType_Model, 10, true);

        $this->render('update', array(
            'model' => $model,
            'itineraryRoomType_Model' => $itineraryRoomType_Model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Guest')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Guest');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Guest('search');
        $model->unsetAttributes();
        $model->dbCriteria->order='guest_id DESC';

        if (isset($_GET['Guest']))
            $model->setAttributes($_GET['Guest']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
