<?php

class RoomInventoryController extends GxController {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('UploadCSV', 'ServicePublicUnlockExpriedRooms'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'upload', 'ServiceUnlockExpriedRooms', 'ServiceDownloadTemplate'),
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
            'model' => $this->loadModel($id, 'RoomInventory'),
        ));
    }

    public function actionUploadCSV() {

        $importcsvController = Yii::app()->getModule('importcsv');

        $uploaddir = $importcsvController->path;
        //$uploadfile = $uploaddir . basename($_FILES['myfile']['name']);

        $uploadfile = basename($_FILES['myfile']['name'], '.csv');
        $currentDate = Yii::app()->getDateFormatter()->format('ddMMyyyy-HHmm', strtotime("now"));
        $uploadfile = $uploaddir . $uploadfile . '(' . $currentDate . ').csv';
        //CVarDumper::dump($uploadfile, 10, true);

        $name_array = explode(".", $_FILES['myfile']['name']);
        $type = end($name_array);

        if ($type == "csv") {
            if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
                $importError = 0;
            } else {
                $importError = 1;
            }
        } else {
            $importError = 2;
        }

        //CVarDumper::dump($uploadfile, 10, true);
        // checking file with earlier imports.
        /*
          if (file_exists($selectfileNew)) {        }
         */

        // view rendering
        echo $this->readCsvData($uploadfile, 'room_inventory');
        Yii::app()->end();
    }

    public function actionCreate() {
        $model = new RoomInventory('function_generator');

        if (isset($_POST['RoomInventory'])) {

            $model->setAttributes($_POST['RoomInventory']);
            if ($model->validate()) {

                $roomNumber = date("YmdHis-");

                for ($i = 0; $i < $_POST['RoomInventory']['quantity']; $i++) {

                    $roomInventory_Model = new RoomInventory;
                    $roomInventory_Model->itinerary_id = $_POST['RoomInventory']['itinerary_id'];
                    $roomInventory_Model->rt_id = $_POST['RoomInventory']['rt_id'];
                    $roomInventory_Model->status = 'available';
                    $roomInventory_Model->room_no = $roomNumber . $i;
                    $roomInventory_Model->save();
                }

                //$this->redirect(array('create'));
                $this->redirect(array('admin'));
            }
        }


        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->assetManager->publish(
                        Yii::getPathOfAlias('application.modules.importcsv.assets') . '/ajaxupload.js'
                )
        );

        Yii::app()->clientScript->registerScript('uploadActionPath', 'var uploadActionPath="' . $this->createUrl('roomInventory/uploadCSV') . '"', CClientScript::POS_BEGIN);

        /*
          Yii::app()->clientScript->registerScriptFile(
          Yii::app()->assetManager->publish(
          Yii::getPathOfAlias('application.modules.importcsv.assets') . '/download.js'
          )
          );
         */

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'RoomInventory');


        if (isset($_POST['RoomInventory'])) {

            if ($model->status != $_POST['RoomInventory']['status']) {
                //echo Yii::trace(CVarDumper::dumpAsString(Yii::app()->user->getId() . '(' . CHttpRequest::getUserHostAddress() . '): has changed the booking item(' . $id . ') status ' . $_POST['Booking']['booking_status'] . '!'), 'bookingActivity');

                $log_model = new Log;
                $log_model->create_date = strtotime("now");
                $log_model->category = 'Stateroom_Status_update';
                $log_model->description = Yii::app()->user->getId() . '(' . CHttpRequest::getUserHostAddress() . '): has changed the Stateroom Inventory item(' . $id . ') status ' . $_POST['RoomInventory']['status'] . '!';
                $log_model->save();
                //CVarDumper::dump($_POST['Booking'], 10, true);
            }
            $model->setAttributes($_POST['RoomInventory']);
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->room_inventory_id));
            }
        }

        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->assetManager->publish(
                        Yii::getPathOfAlias('application.modules.importcsv.assets') . '/ajaxupload.js'
                )
        );

        Yii::app()->clientScript->registerScript('uploadActionPath', 'var uploadActionPath="' . $this->createUrl('roomInventory/uploadCSV') . '"', CClientScript::POS_BEGIN);

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'RoomInventory')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('RoomInventory');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin($status = null) {

        //$Criteria = new CDbCriteria();
        //$Criteria->condition = "status like '%".$status."%'";
        //$model = RoomInventory::model()->findAll($Criteria);
        $model = new RoomInventory('search');
        $model->unsetAttributes();


        if (isset($_GET['RoomInventory']))
            $model->setAttributes($_GET['RoomInventory']);
		

        if (!empty($status)) {
            $model->setAttribute('status', $status);
        }
		

        //CVarDumper::dump($model, 10, true);
        //exit();
        //$model->status = $status;
        // $model->dbCriteria->order = 'room_inventory_id DESC';
        //$model->defaultOrder = 'rt_id ASC';

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionServicePublicUnlockExpriedRooms() {

        $this->actionServiceUnlockExpriedRooms();
    }

    public function actionServiceUnlockExpriedRooms() {

        $criteria = new CDbCriteria;
        //$criteria->addInCondition("wall_id", $wall_ids); // $wall_ids = array ( 1, 2, 3, 4 );
        $criteria->addCondition("status LIKE '%locked%'");
        $criteria->addCondition('update_time < ' . strtotime("now"));
        /*
          $criteria->params = array(
          ':match' => '%locked%',
          );
         */
        //CVarDumper::dump($criteria, 10, true);

        RoomInventory::model()->updateAll(
                array(
            'update_time' => 0,
            'booking_ip' => '',
			'reservation_code'=> '',
            'status' => 'available'
                ), $criteria
        );
        //$reservation_code->status = 0;
        //$reservation_code->update();


        $criteria = new CDbCriteria;
        $criteria->addCondition("status = 2");
        $criteria->addCondition('lock_date < ' . strtotime("now"));

        ReservationCode::model()->updateAll(
                array(
            'lock_date' => 0,
            'status' => 0
                ), $criteria
        );

        $model = new RoomInventory('search');

        $this->render('admin', array(
            'model' => $model,
        ));
        /* */
    }

    public function actionServiceDownloadTemplate($itinerary_id, $rt_id) {


        //CVarDumper::dump($itinerary_id, 10, true);
        //CVarDumper::dump($rt_id, 10, true);
        Yii::import('ext.ECSVExport');

        $data = array(
            array(
                'itinerary_id' => $itinerary_id,
                'rt_id' => $rt_id,
                'room_no' => 'Room no 123',
                'update_time' => '',
                'booking_ip' => '',
                'status' => 'available',
            )
        );
        $csv = new ECSVExport($data);
        $output = $csv->toCSV(); // returns string by default
        //echo $output;
        Yii::app()->getRequest()->sendFile('RoomInventory.csv', $output, "text/csv", false);
        exit();
    }

    public function readCsvData($uploadfile, $table) {

        $model = new ImportCsv;
        $filecontent = file($uploadfile);
        $lengthFile = sizeof($filecontent);

        $tableColumns = $model->tableColumns($table);
        //$columns = $_POST['Columns'];

        if ($table == 'room_inventory') {
            $columns = array(
                0 => '',
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => '',
            );
        }

        $insertCounter = 0;
        $stepsOk = 0;

        $delimiter = str_replace('&quot;', '"', str_replace("&#039;", "'", ""));   //import csv Line: 168
        $textDelimiter = str_replace('&quot;', '"', str_replace("&#039;", "'", ""));   //import csv Line: 169
        // begin transaction

        $transaction = Yii::app()->db->beginTransaction();
        try {

            // import to database
            //Start from CSV line 1.  $i = 1
            for ($i = 1; $i < $lengthFile; $i++) {
                //if ($i != 0 && $filecontent[$i] != '') { Commented By Sai . Dunno why need i!=0 -.-   5-3-2015
                if ($filecontent[$i] != '') {
                    $csvLine = ($textDelimiter) ? str_getcsv($filecontent[$i], $delimiter, $textDelimiter) : str_getcsv($filecontent[$i], $delimiter);

                    //CVarDumper::dump($csvLine, 10, true);
                    //Mode 1. insert All Sai: ()
                    $insertArray[] = $csvLine;
                    $insertCounter++;


                    if ($i == $lengthFile - 1) {
                        $import = $model->InsertAll($table, $insertArray, $columns, $tableColumns);
                        //$insertCounter = 0;
                        //$insertArray = array();

                        /*
                          if ($import != 1)
                          $arrays[] = $i;
                         */
                    }
                }
            }

            /*
              if ($insertCounter != 0)
              $model->InsertAll($table, $insertArray, $columns, $tableColumns);
             */

            // commit transaction if not exception

            $transaction->commit();

            $tmp_str = ' Inventory';
            if ($insertCounter > 1) {
                $tmp_str = ' Inventories';
            }
            //return 'success';
            return 'You have created ' . $insertCounter . $tmp_str . ' items.';
        } catch (Exception $e) { // exception in transaction
            $transaction->rollBack();
            //return 'Error';
            return 'Upload file error.';
        }
    }

}
