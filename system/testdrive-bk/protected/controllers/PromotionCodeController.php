<?php

class PromotionCodeController extends GxController {

    public $pricingPromotion = array(
        'currency-all',
        'currency-onetwo',
        'currency-threefour',
        'percentage-all',
        'percentage-onetwo',
        'percentage-threefour'
    );
    public $presetPromotion = array(
        'cruisefare-threefour',
        'cruisefare-two',
        'cruisefare_50percent-two',
    );

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'upload', 'ServiceGetAllRoomType'),
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
            'model' => $this->loadModel($id, 'PromotionCode'),
        ));
    }

    public function actionCreate() {
        $model = new PromotionCode;
        $model->accumulate_quota = $model->quota;

        /*
          do {

          $promotion_code = $this->getRandomString(6);
          $results = $model->findAll(
          array(
          //'condition' => 'language="' . Yii::app()->params->language . '"',
          'condition' => 'promotion_code="' . $promotion_code . '"',
          ));
          $model->promotion_code = $promotion_code;
          //echo $model->promotion_code;
          //CVarDumper::dump($results, 10, true);
          } while (count($results));
         */

        if (isset($_POST['PromotionCode'])) {

            $model->setAttributes($_POST['PromotionCode']);
            $model->setAttribute('create_date', strtotime("now"));
            $model->setAttribute('update_date', strtotime("now"));
            //$model->start_date = CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']);
            //$model->end_date = CDateTimeParser::parse($model->end_date, Yii::app()->params->dateFormat['long']);


            if ($model->validate()) {
				if(!empty($_POST['Others'])){
					$this->updatePromotion($model->promotion_id, $_POST['Others']['room_model']);
				}
            }

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) {
                    Yii::app()->end();
                } else {
                    //$this->redirect(array('view', 'id' => $model->promotion_id));

					if(!empty($_POST['Others'])){
						$this->updatePromotion($model->promotion_id, $_POST['Others']['room_model']);
					}
					$this->redirect(array('admin'));
                    //$this->redirect(array('update', 'id' => $model->promotion_id));
                }
            }
        }

        $room_model = GxHtml::listDataEx(RoomType::model()->findAllAttributes(array('rt_id' => 'rt_name'), true), 'rt_id', 'rt_name');
        $others = array(
            'room_model' => $room_model,
            'pricingPromotion' => $this->pricingPromotion,
            'presetPromotion' => $this->presetPromotion
        );

        $this->render('create', array(
            'model' => $model,
            'others' => $others,
        ));
    }

    public function actionUpdate($id) {

        $model = $this->loadModel($id, 'PromotionCode');
        //$model->accumulate_quota = $model->quota;

        if (isset($_POST['PromotionCode'])) {


            $model->setAttributes($_POST['PromotionCode']);
            $model->setAttribute('update_date', strtotime("now"));
            // CVarDumper::dump($_POST['PromotionCode'], 10, true);
            //CVarDumper::dump($model, 10, true);
            //$model->start_date = CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']);
            //$model->end_date = CDateTimeParser::parse($model->end_date, Yii::app()->params->dateFormat['long']);

            if ($model->validate()) {
                $this->updatePromotion($id, $_POST['Others']['room_model']);
            }
            if ($model->save()) {
                //CVarDumper::dump($model, 10, true);
               // exit();

                /*
                  if ($id != $model->promotion_id) {
                  RoomtypePromotioncode::model()->updateAll(
                  array(
                  'promotion_id' => $model->promotion_id
                  )
                  , 'promotion_id="' . $id . '"'
                  );
                  }
                 */
                $this->redirect(array('view', 'id' => $model->promotion_id));
            }
        }


        //array_values
        $room_model_data = GxHtml::listDataEx(RoomtypePromotioncode::model()->findAll(
                                array(
                                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                                    'condition' => 'promotion_id="' . $id . '"',
        )));

        $room_model = GxHtml::listDataEx(RoomType::model()->findAllAttributes(array('rt_id' => 'rt_name'), true), 'rt_id', 'rt_name');
        $others = array(
            'room_model' => $room_model,
            'room_model_data' => $room_model_data,
            'pricingPromotion' => $this->pricingPromotion,
            'presetPromotion' => $this->presetPromotion
        );

        $this->render('update', array(
            'model' => $model,
            'others' => $others,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'PromotionCode')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('PromotionCode');
        $dataProvider->sort->defaultOrder = 'promotion_id DESC';
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new PromotionCode('search');
        $model->unsetAttributes();
        $model->dbCriteria->order = 'promotion_id DESC';

        if (isset($_GET['PromotionCode']))
            $model->setAttributes($_GET['PromotionCode']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function getRandomString($length = 6) {
        //$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ+-*#&@!?";
        $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ1234567890";
        $validCharNumber = strlen($validCharacters);

        $result = "";

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }

        return $result;
    }

    public function updatePromotion($promoID, $room_model) {

        $model = new RoomtypePromotioncode;

        //CVarDumper::dump($room_model, 10, true);
        //exit();

        foreach ($room_model as $key => $value) {

            if ($value == 1) {
                /*
                  CVarDumper::dump($key, 10, true);
                  CVarDumper::dump($promoID, 10, true);
                 */
                $model = new RoomtypePromotioncode; //very important! to use a new model! 24-03-2015
                $model->promotion_id = $promoID;
                $model->rt_id = $key;
                $model->save(true);
                //CVarDumper::dump($model->getErrors(), 10, true);
            } else {

                $model->deleteAll(
                        array(
                            'condition' => 'promotion_id="' . $promoID . '" AND rt_id="' . $key . '"',
                        )
                );
            }
        }
    }

    public function actionServiceGetAllRoomType($itinerary_id, $promotion_id) {

        // logic
        //$model = $this->loadModel($id);
        $data = array();
        $data["promotionCodeModels"] = array();
        $data["itineraryRoomTypeModels"] = ItineraryRoomType::model()->with('rt')->findAll(
                array(
                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                    'condition' => 'itinerary_id="' . $itinerary_id . '"',
                )
        );




        if (!empty($promotion_id)) {

            $criteria = new CDbCriteria;
            //$criteria->addCondition("itinerary_id LIKE '%" . $itinerary_id . "'");
            //$criteria->addCondition('promotion_id = ' . $_GET['promotion_id']);
            $criteria->addCondition("promotion.promotion_id LIKE '%" . $promotion_id . "%'");
            $criteria->addCondition("promotion.itinerary_id LIKE '%" . $itinerary_id . "%'");
            //$criteria->order = 'fare_guest1_2 DESC';

            $roomtypePromotionCodes = RoomtypePromotioncode::model()->with('promotion')->findAll(
                    $criteria
                    /*
                      array(
                      'condition' => 'itinerary_id="' . $itinerary_id . '"',
                      )
                     */
            );
            foreach ($roomtypePromotionCodes as $roomtypePromotionCode) {
                array_push($data["promotionCodeModels"], $roomtypePromotionCode->rt_id);
            }
        }
        //CVarDumper::dump($roomtypePromotionCodes, 10, true);
        //exit();

        if (count($data["itineraryRoomTypeModels"]) == 0) {

            echo '<h2>No available room in ' . $itinerary_id . '</h2>';
            Yii::app()->end();
        }
        $this->renderPartial('_ajaxItinereayRoomType', $data, false, false);
    }

}
