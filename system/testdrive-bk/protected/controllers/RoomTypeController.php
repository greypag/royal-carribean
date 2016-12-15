<?php

class RoomTypeController extends GxController {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'upload'),
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
            'model' => $this->loadModel($id, 'RoomType'),
        ));
    }

    public function actionCreate() {
        $model = new RoomType;


        if (isset($_POST['RoomType'])) {
            $model->setAttributes($_POST['RoomType']);
            $model->create_time = time();

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->sys_rt_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        //CVarDumper::dump($id);
        $model = $this->loadModel($id, 'RoomType');
        //$model->setScenario('delete_update');


        if (isset($_POST['RoomType'])) {

            //CVarDumper::dump($model->room_image, 10, true);
            if ($_POST['RoomType']['room_image'] != $model->room_image) {
                $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../' . str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->room_image);
                if (!is_dir($file_path) && file_exists($file_path)) {
                    unlink($file_path);
                }
            }


            $model->setAttributes($_POST['RoomType']);
            //$model->create_time = time();
            $model->setAttribute('update_time', time());

            if ($model->save()) {
				
			
				ItineraryRoomType::model()->updateAll(
						array(
						'rt_id' => $model->sys_rt_id
						)
						, 'rt_id="' . $_POST['RoomType']['rt_id'] . '"'
				);
                $this->redirect(array('view', 'id' => $model->sys_rt_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {

        $model = $this->loadModel($id, 'RoomType');
        //$model->setScenario('delete_update');
        $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../' . str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->room_image);
        //CVarDumper::dump($file_path);
        if (!is_dir($file_path) && file_exists($file_path)) {
            unlink($file_path);
        }

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            //$this->loadModel($id, 'RoomType')->delete();
					
			$criteria = new CDbCriteria;
			$criteria->addInCondition('rt_id', array($id));
			ItineraryRoomType::model()->deleteAll($criteria);
					
			$criteria = new CDbCriteria;
			$criteria->addInCondition('rt_id', array($id));
			RoomInventory::model()->deleteAll($criteria);
			
            $model->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionUpload($type) {


        Yii::app()->royalCaribbeanHelper->actionAjaxFileUpload($type);
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('RoomType');
        $dataProvider->sort->defaultOrder = 'create_time DESC';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new RoomType('search');
        $model->unsetAttributes();

        if (isset($_GET['RoomType']))
            $model->setAttributes($_GET['RoomType']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
