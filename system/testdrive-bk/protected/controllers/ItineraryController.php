<?php

class ItineraryController extends GxController {

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
            'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('serviceGetItineraries'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Itinerary'),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Itinerary;

        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);
        //echo realpath(Yii::app()->basePath ).'<br/>';
        //echo realpath(Yii::app()->basePath . '/../images').'<br/>';
        //echo '================================<br/>';
        //echo Yii::app()->params->upload_PDFPath.'<br/>';
        //echo realpath(Yii::app()->params->upload_PDFPath);

        if (isset($_POST['Itinerary'])) {

            //$model->attributes = $_POST['Itinerary'];
            $model->setAttributes($_POST['Itinerary']);

            //If you are only new to Yii and not in PHP, than you may know that uploaded files goes via $_FILES global variable 
            //and not via $_POST global variable. So to get uploaded file, you use  CUploadedFile::getInstance
            //$model->image = CUploadedFile::getInstance($model, 'image');
            //$model->pdf = CUploadedFile::getInstance($model, 'pdf');

            $model->setAttribute('image', $_POST['Itinerary']['image']);
            $model->setAttribute('pdf', $_POST['Itinerary']['pdf']);
            $model->setAttribute('create_time', strtotime("now"));
            
            /*
            $model->image = $_POST['Itinerary']['image'];
            $model->pdf = $_POST['Itinerary']['pdf'];
            $model->create_time = time();
            */
            //CVarDumper::dump($model, 10, true);
            if ($model->save()) {
                /*
                  if (!is_null($model->image)) {
                  $model->image->saveAs(realpath(Yii::app()->params->upload_ImagePath) . '/' . $model->image);
                  }
                  if (!is_null($model->pdf)) {
                  $model->pdf->saveAs(realpath(Yii::app()->params->upload_PDFPath) . '/' . $model->pdf);
                  }
                 */
                $this->redirect(array('update', 'id' => $model->itinerary_id));
            } else {
                Yii::log("errors saving SomeModel: " . var_export($model->getErrors(), true), CLogger::LEVEL_WARNING, __METHOD__);
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

        $model = $this->loadModel($id, 'Itinerary');
        //unlink(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../' . $model->image);
        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);
        //Yii::app()->end();
        // 10 is the default depth, and passing true will enable highlighting

        if (isset($_POST['Itinerary'])) {

            //$model->attributes = $_POST['Itinerary'];
            //$model->image = CUploadedFile::getInstance($_POST['Itinerary']['image'], 'image');
            //$model->pdf = CUploadedFile::getInstance($_POST['Itinerary']['pdf'], 'pdf');

            if (!empty($_POST['Itinerary']['image']) != $model->image && !empty($model->image)) {
                $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../' . str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->image);
                if (!is_dir($file_path) && file_exists($file_path)) {
                    unlink($file_path);
                }
                //$model->image = $_POST['Itinerary']['image'];
                $model->setAttribute('image', $_POST['Itinerary']['image']);
            }
            if (!empty($_POST['Itinerary']['pdf']) != $model->pdf && !empty($model->pdf)) {
                $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../' . str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->pdf);
                if (!is_dir($file_path) && file_exists($file_path)) {
                    unlink($file_path);
                }
                //$model->pdf = $_POST['Itinerary']['pdf'];
                $model->setAttribute('pdf', $_POST['Itinerary']['pdf']);
            }


            //$model->image = CUploadedFile::getInstance($model, 'image');
            //$model->pdf = CUploadedFile::getInstance($model, 'pdf');
            //$model->start_date = CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']);
            //$model->end_date = CDateTimeParser::parse($model->end_date, Yii::app()->params->dateFormat['long']);
            //$model->update_time = time();
            $model->setAttribute('update_time', time());
            //$old_itinerary_id = $model->itinerary_id;
			$old_itinerary_id = $id;
            
            $model->setAttributes($_POST['Itinerary'], false);

			/*
              CVarDumper::dump($old_itinerary_id, 10, true);
              CVarDumper::dump($_POST['Itinerary'], 10, true);
              exit();
			*/
            
            if ($model->save()) {

                if ($old_itinerary_id != $_POST['Itinerary']['itinerary_id']) {

					ItineraryRoomType::model()->updateAll(
                            array(
                        'itinerary_id' => $model->itinerary_id
                            )
                            , 'itinerary_id="' . $old_itinerary_id . '"'
                    );
					
					
                    RoomInventory::model()->updateAll(
                            array(
                        'itinerary_id' => $model->itinerary_id
                            )
                            , 'itinerary_id="' . $old_itinerary_id . '"'
                    );
                }
                //if ($model->save(true, array('itinerary_name', 'days_nights_full_desc', 'days_nights_short_desc', 'minimum_cruise_fares', 'language', 'start_date', 'end_date'))) {

                /*
                  if (!is_null($model->image)) {
                  if ($model->save(true, array('image'))) {
                  //$model->image->saveAs(realpath(Yii::app()->params->upload_ImagePath) . '/' . $model->image);
                  } else {
                  $update_successful = false;
                  }
                  }

                  if (!is_null($model->pdf)) {
                  if ($model->save(true, array('pdf'))) {
                  //$model->pdf->saveAs(realpath(Yii::app()->params->upload_PDFPath) . '/' . $model->pdf);
                  } else {
                  $update_successful = false;
                  }
                  }
                  if ($update_successful) {
                  } */
                $this->redirect(array('view', 'id' => $model->itinerary_id));
            } else {
                Yii::log("errors saving SomeModel: " . var_export($model->getErrors(), true), CLogger::LEVEL_WARNING, __METHOD__);
            }
        }

        $bookingRecord = Booking::model()->countByAttributes(
                array(
                    'itinerary_id' => $id,
                )
        );
		
		$InventoryRecord = RoomInventory::model()->countByAttributes(
                array(
                    'itinerary_id' => $id,
                )
        );
		
		$anyrecord = 0;
		if( count($bookingRecord) || count($InventoryRecord) ){
		
			$anyrecord = 1;
		}
		
        $this->render('update', array(
            'model' => $model,
            'bookingRecord' => $anyrecord,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id, 'Itinerary');
        $model->delete();
        //CVarDumper::dump(dirname(__FILE__). '../../' . $model->image, 10, true);
        $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../' . str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->image);
        if (!is_dir($file_path) && file_exists($file_path)) {
            unlink($file_path);
        }
        $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../' . str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->pdf);
        if (!is_dir($file_path) && file_exists($file_path)) {
            unlink($file_path);
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionUpload($type) {

        //phpinfo();
        Yii::app()->royalCaribbeanHelper->actionAjaxFileUpload($type);
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Itinerary');
        $dataProvider->sort->defaultOrder = 'create_time DESC';



        //CVarDumper::dump($dataProvider, 10, true);
        $this->render('index', array(
            'dataProvider' => $dataProvider,
                //'ajaxRoomTypePrice' => 'Content loaded',
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Itinerary('search');

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Itinerary']))
            $model->attributes = $_GET['Itinerary'];


        Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_start_date').datepicker(jQuery.extend({showMonthAfterYear:false},{'dateFormat': '" . Yii::app()->params->dateFormat['display_long'] . "'}));
   $('#datepicker_for_end_date').datepicker(jQuery.extend({showMonthAfterYear:false},{'dateFormat': '" . Yii::app()->params->dateFormat['display_long'] . "'}));
}
");

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    //==========================================================

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Itinerary the loaded model
     * @throws CHttpException
     */
    /*
      public function loadModel($id) {
      $model = Itinerary::model()->findByPk($id);
      if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
      return $model;
      }
     */
    // public function actionServiceGetItineraries($id) {
    public function actionServiceGetItineraries() {

        //$model = Itinerary::model()->findByPk($id);
        //$itineraries = Itinerary::model()->with('cruise')->findAll();
        /*
          $models = Itinerary::model()->with(
          array(
          'cruise' => array(
          // we don't want to select posts
          'select' => '*',
          // but want to get only users with published posts
          'joinType' => 'LEFT JOIN',
          //'condition' => 'posts.published=1',
          )
          )
          )->findAll();
         */
        //$cruise = $models->getRelated('cruise');
        // CVarDumper::dump($models, 10, true);
        /*
          foreach ($itineraries as $itinerary) {

          CVarDumper::dump($itinerary, 10, true);
          CVarDumper::dump($itinerary->getRelated('cruise'), 10, true);
          CVarDumper::dump('===============================', 10, true);
          }
         */


        header('Content-Type: application/json');
        //echo  NJSON::encode(Itinerary::model()->with('cruise')->findAll());
        //echo NJSON::encode(Itinerary::model()->with('cruise', 'cruise.cruise_id')->findAll());
        //Yii::app()->end();


        $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;

		
        echo ($callback ? $callback . '(' : '') . NJSON::encode(
                array(
                    "result" => 'success',
                    "data" => NJSON::encode(Itinerary::model()->with('cruise')->findAll(
                            
                        array(
						"condition" => "t.status NOT LIKE '%unpublish%'",
						//"condition" => "timestamp(t.start_date) > NOW()",
						//'order' => 'timestamp(t.start_date) ASC')
						'order' => 't.start_date ASC')
                    ))
        )) . ($callback ? ')' : '');
    }

    public function actionServiceGetAllRoomType($cruise_id) {

        // logic
        //$model = $this->loadModel($id);

        $data = array();
        $data["roomTypeModels"] = RoomType::model()->findAll(
                array(
                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                    'condition' => 'cruise_id="' . $cruise_id . '"',
                    'group' => 'rt_id',
                )
        );
        if (count($data["roomTypeModels"]) == 0) {

            echo '<h1>No available room in ' . $cruise_id . '</h1>';
            Yii::app()->end();
        }
        $data["itinereayRoomTypeModel"] = ItineraryRoomType::model();
        $data["data_itinereayRoomTypeModels"] = ItineraryRoomType::model()->findAll(
                array(
                    'condition' => 'itinerary_id="' . $_GET['itinerary_id'] . '"' . 'and cruise_id="' . $_GET['cruise_id'] . '"'
                )
        );
        $data["itinerary_id"] = $_GET['itinerary_id'];
        $this->renderPartial('_ajaxItinereayRoomType', $data, false, true);

        //$this->renderPartial('_ajaxItinereayRoomType', $data, false, true);
        //CVarDumper::dump($this->renderPartial('_ajaxItinereayRoomType', $data, false, true)  , 10, true);
        //echo json_encode(array("renderedHtml" =>  $this->renderPartial('_ajaxItinereayRoomType', $data, false, true) ));
        //$this->render('_ajaxItinereayRoomType', $data, false);
        /*
          echo json_encode(array(
          "roomTypeModels" => json_encode($data["roomTypeModels"]),
          "itinerary_id" => json_encode($model->itinerary_id),
          "itinereayRoomTypeModel" => json_encode(ItineraryRoomType::model()),


          ));
         */
    }

    public function actionServiceCreateRoomTypePrice($formID) {
        /*
          $data = array();
          $data["roomTypeModels"] = RoomType::model()->findAll(
          array(
          'condition' => 'language="' . Yii::app()->params->language . '"',
          'group' => 'rt_id',
          )
          );
          $data["itinereayRoomTypeModel"] = ItineraryRoomType::model();
          $data["itinerary_id"] = $model->itinerary_id;
         */

        $model = new ItineraryRoomType;
        if (isset($_POST['ItineraryRoomType'])) {
            $model->setAttributes($_POST['ItineraryRoomType']);


            //CVarDumper::dump($model, 10, true);
            //CVarDumper::dump($model->attributes, 10, true);
            $model->start_date = CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']);
            $model->end_date = CDateTimeParser::parse($model->end_date, Yii::app()->params->dateFormat['long']);
            if ($model->save()) {

                if (Yii::app()->getRequest()->getIsAjaxRequest()) {

                    echo json_encode(array("result" => 'success', 'formID' => '#' . $formID));
                    Yii::app()->end();
                } else {

                    $this->redirect(array('view', 'id' => $model->irt_id));
                }
            } else {

                //CVarDumper::dump($formID, 10, true);
                //CVarDumper::dump($model->getErrors(), 10, true);
                //header('Content-type: application/json');
                echo json_encode(array("result" => 'Error', 'formID' => '#' . $formID, 'formPrefix' => 'ItineraryRoomType', 'details' => $model->getErrors()));
                //Yii::app()->end();
            }
        }

        //$this->render('create', array('model' => $model));
        //echo json_encode(array("setRoomTypePrice" => 'yes, that was actionServiceSetRoomTypePrice handler'));
    }

    public function actionServiceUpdateRoomTypePrice($formID) {

        $model = ItineraryRoomType::model()->findByPk($_POST['ItineraryRoomType']['irt_id']);

        if (isset($_POST['ItineraryRoomType'])) {
            $model->setAttributes($_POST['ItineraryRoomType']);
            $model->start_date = CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']);
            $model->end_date = CDateTimeParser::parse($model->end_date, Yii::app()->params->dateFormat['long']);

            //CVarDumper::dump($model , 10, true);
            if ($model->save()) {

                if (Yii::app()->getRequest()->getIsAjaxRequest()) {

                    echo json_encode(array("result" => 'success', 'formID' => '#' . $formID));
                    Yii::app()->end();
                } else {

                    $this->redirect(array('view', 'id' => $model->irt_id));
                }
            } else {

                echo json_encode(array("result" => 'Error', 'formID' => '#' . $formID, 'formPrefix' => 'ItineraryRoomType', 'details' => $model->getErrors()));
                //Yii::app()->end();
            }
        }
    }

    public function actionServiceDeleteRoomTypePrice($formID) {

        $model = ItineraryRoomType::model()->findByPk($_POST['ItineraryRoomType']['irt_id']);

        if (isset($_POST['ItineraryRoomType'])) {

            //CVarDumper::dump($model , 10, true);
            if ($model->delete()) {

                if (Yii::app()->getRequest()->getIsAjaxRequest()) {
                    echo json_encode(array("result" => 'success', 'formID' => '#' . $formID));
                    Yii::app()->end();
                }
            } else {

                echo json_encode(array("result" => 'Error', 'formID' => '#' . $formID, 'formPrefix' => 'ItineraryRoomType', 'details' => $model->getErrors()));
                //Yii::app()->end();
            }
        }
    }

    public function actionServiceloadAvailableRoomID() {

        $data = ItineraryRoomType::model()->findAll('itinerary_id=:itinerary_id', array(':itinerary_id' => $_POST['itinerary_id']));


        //$data = CHtml::listData($data, 'rt_id', 'rt_id');
        //CVarDumper::dump($data, 10, true);
        //exit();

        if (count($data) == 0) {

            echo CHtml::tag('option', array('value' => ""), CHtml::encode('No available room in above itinereay.'), true);
        } else {

            foreach ($data as $itineraryRoomType) {
                $roomType = RoomType::model()->find('sys_rt_id=:rt_id', array(':rt_id' => $itineraryRoomType->rt_id));

                echo CHtml::tag('option', array('value' => $itineraryRoomType->rt_id), CHtml::encode($roomType->rt_id . ': ' . $roomType->rt_name), true);
            }
        }
    }

    /**
     * Performs the AJAX validation.
     * @param Itinerary $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'itinerary-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
