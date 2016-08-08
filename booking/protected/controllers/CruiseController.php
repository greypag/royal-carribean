<?php

class CruiseController extends GxController {

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'upload'),
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
            'model' => $this->loadModel($id, 'Cruise'),
        ));
    }

    public function actionCreate() {
        $model = new Cruise;


        if (isset($_POST['Cruise'])) {
            $model->setAttributes($_POST['Cruise']);

            if ($model->save()) {
                $model->create_time = time();
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->cruise_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Cruise');


        if (isset($_POST['Cruise'])) {

            $old_cruise_id = $model->cruise_id;
            $model->setAttributes($_POST['Cruise']);
            if ($model->save()) {


                if ($old_cruise_id != $_POST['Cruise']['cruise_id']) {
                    RoomType::model()->updateAll(
                            array(
                        'cruise_id' => $_POST['Cruise']['cruise_id']
                            )
                            , 'cruise_id="' . $id . '"'
                    );

                    Itinerary::model()->updateAll(
                            array(
                        'cruise_id' => $_POST['Cruise']['cruise_id']
                            )
                            , 'cruise_id="' . $id . '"'
                    );
                    ItineraryRoomType::model()->updateAll(
                            array(
                        'cruise_id' => $_POST['Cruise']['cruise_id']
                            )
                            , 'cruise_id="' . $id . '"'
                    );
                }

                $this->redirect(array('view', 'id' => $model->cruise_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Cruise')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else {
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cruise');
        $dataProvider->sort->defaultOrder = 'update_time DESC';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Cruise('search');
        $model->unsetAttributes();

        if (isset($_GET['Cruise']))
            $model->setAttributes($_GET['Cruise']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
