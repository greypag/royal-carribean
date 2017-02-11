<?php

class RoomtypePromotioncodeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'RoomtypePromotioncode'),
		));
	}

	public function actionCreate() {
		$model = new RoomtypePromotioncode;


		if (isset($_POST['RoomtypePromotioncode'])) {
			$model->setAttributes($_POST['RoomtypePromotioncode']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'RoomtypePromotioncode');


		if (isset($_POST['RoomtypePromotioncode'])) {
			$model->setAttributes($_POST['RoomtypePromotioncode']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'RoomtypePromotioncode')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('RoomtypePromotioncode');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new RoomtypePromotioncode('search');
		$model->unsetAttributes();

		if (isset($_GET['RoomtypePromotioncode']))
			$model->setAttributes($_GET['RoomtypePromotioncode']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}