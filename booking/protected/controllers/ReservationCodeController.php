<?php

class ReservationCodeController extends GxController {

    public function filters() {
        return array(
            'accessControl',
        );
    }
    
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('serviceGetItineraries','UploadCSV', 'ServicePublicUnlockExpriedRooms'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'upload', 'serviceGetAllRoomType', 'serviceCreateRoomTypePrice', 'serviceUpdateRoomTypePrice', 'serviceDeleteRoomTypePrice', 'serviceloadAvailableRoomID'),
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
            'model' => $this->loadModel($id, 'ReservationCode'),
        ));
    }

    public function actionCreate() {
        $model = new ReservationCode;


        if (isset($_POST['ReservationCode'])) {
            $model->setAttributes($_POST['ReservationCode']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        Yii::app()->clientScript->registerScriptFile(
                Yii::app()->assetManager->publish(
                        Yii::getPathOfAlias('application.modules.importcsv.assets') . '/ajaxupload.js'
                )
        );
        Yii::app()->clientScript->registerScript('uploadActionPath', 'var uploadActionPath="' . $this->createUrl('ReservationCode/uploadCSV') . '"', CClientScript::POS_BEGIN);

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'ReservationCode');


        if (isset($_POST['ReservationCode'])) {
            $model->setAttributes($_POST['ReservationCode']);
            $model->setAttribute('update_date', strtotime("now"));
            $model->setAttribute('lock_date', '0');

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
            $this->loadModel($id, 'ReservationCode')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ReservationCode');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new ReservationCode('search');
        $model->unsetAttributes();

        if (isset($_GET['ReservationCode']))
            $model->setAttributes($_GET['ReservationCode']);

        $this->render('admin', array(
            'model' => $model,
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
        echo $this->readCsvData($uploadfile, 'reservation_code');
        Yii::app()->end();
    }
    
    
    public function readCsvData($uploadfile, $table) {

        $model = new ImportCsv;
        $filecontent = file($uploadfile);
        $lengthFile = sizeof($filecontent);
        $now = strtotime("now");

        $tableColumns = $model->tableColumns($table);
        //$columns = $_POST['Columns'];

        if ($table == 'reservation_code') {
            $columns = array(
                0 => '',
                1 => 1,
                2 => 2,
                3 => '',
                4 => '',
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
            //Start from CSV line 0.  $i = 0
            for ($i = 0; $i < $lengthFile; $i++) {
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

            $tmp_str = ' Resercation code';
            if ($insertCounter > 1) {
                $tmp_str = ' Resercation codes';
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
