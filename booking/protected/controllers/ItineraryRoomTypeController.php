<?php

class ItineraryRoomTypeController extends GxController {

    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index','view','create', 'update', 'upload'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'ItineraryRoomType'),
        ));
    }

    public function actionCreate() {
        $model = new ItineraryRoomType;

        if (isset($_POST['ItineraryRoomType'])) {
            $model->setAttributes($_POST['ItineraryRoomType']);

            $model->start_date = CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']);
            $model->end_date = CDateTimeParser::parse($model->end_date, Yii::app()->params->dateFormat['long']);
            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->irt_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'ItineraryRoomType');


        if (isset($_POST['ItineraryRoomType'])) {
            $model->setAttributes($_POST['ItineraryRoomType']);

            $model->start_date = CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']);
            $model->end_date = CDateTimeParser::parse($model->end_date, Yii::app()->params->dateFormat['long']);
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->irt_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'ItineraryRoomType')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ItineraryRoomType');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new ItineraryRoomType('search');
        $model->unsetAttributes();

        if (isset($_GET['ItineraryRoomType']))
            $model->setAttributes($_GET['ItineraryRoomType']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
