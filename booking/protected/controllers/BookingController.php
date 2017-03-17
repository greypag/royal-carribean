<?php

class BookingController extends GxController {

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('servicePromotion', 'stepone', 'steponeb', 'steptwo', 'stepthree', 'stepfour', 'serviceReleaseRoomLock', 'thankyou'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'upload', 'DownloadExcel'),
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

    public function init() {

        //CHtml::$beforeRequiredLabel = '* ';
        CHtml::$beforeRequiredLabel = '*';
        CHtml::$afterRequiredLabel = '';

        /*
          $language = CHttpRequest::getParam('language');
          if (!empty($language) && $language == 'zh_tw') {
          Yii::app()->language = $language;
          }
         */



        Yii::import('ext.LangPick.ELangPick');
        ELangPick::setLanguage();
		if(!empty($_GET['lang'])){


			if($_GET['lang'] == 'en'){

				Yii::app()->language = 'en';
				Yii::app()->request->cookies['language'] = new CHttpCookie('language', 'en');
			}else {

				Yii::app()->language = 'zh_tw';
				Yii::app()->request->cookies['language'] = new CHttpCookie('language', 'zh_tw');
			}
		}


        //CVarDumper::dump(ELangPick::getLanguages(), 10, true);
        return parent::init();
    }

    public function actionView($id) {

        //CVarDumper::dump($this->loadModel($id, 'Booking'), 10, true);

        $this->render('view', array(
            'model' => $this->loadModel($id, 'Booking'),
            'id' => $id,
        ));
    }

    public function actionCreate() {
        $model = new Booking;


        if (isset($_POST['Booking'])) {
            $model->setAttributes($_POST['Booking']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->booking_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Booking');

        //Yii::log('', CLogger::LEVEL_ERROR, 'Message Here...');



        if (isset($_POST['Booking'])) {
            //CVarDumper::dump($model->booking_status, 10, true);
            //CVarDumper::dump($_POST['Booking']['booking_status'], 10, true);

            /*
              CVarDumper::dump($model->booking_status, 10, true);
              CVarDumper::dump( $_POST['Booking']['booking_status'], 10, true);
             */

            //CVarDumper::dump($model->booking_status != $_POST['Booking']['booking_status'], 10, true);
            if ($model->booking_status != $_POST['Booking']['booking_status']) {
                //echo Yii::trace(CVarDumper::dumpAsString(Yii::app()->user->getId() . '(' . CHttpRequest::getUserHostAddress() . '): has changed the booking item(' . $id . ') status ' . $_POST['Booking']['booking_status'] . '!'), 'bookingActivity');

                $log_model = new Log;
                $log_model->create_date = strtotime("now");
                $log_model->category = 'Booking_Status_update';
                $log_model->description = Yii::app()->user->getId() . '(' . CHttpRequest::getUserHostAddress() . '): has changed the booking item(' . $id . ') status ' . $_POST['Booking']['booking_status'] . '!';
                $log_model->save();
                //CVarDumper::dump($_POST['Booking'], 10, true);
            }

            $model->setAttributes($_POST['Booking']);
            if ($model->save()) {
                //$this->redirect(array('view', 'id' => $model->booking_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
                //'model_guests' => $model_guests
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Booking')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {



        $this->setLayout();
        $this->render('front-end/404', array('error' => '404: Page not found.'));
        exit();
        /*
          $dataProvider = new CActiveDataProvider('Booking');
          $this->render('index', array(
          'dataProvider' => $dataProvider,
          ));
         */
    }

    public function actionAdmin() {
        $model = new Booking('search');
        $model->unsetAttributes();

        if (isset($_GET['Booking']))
            $model->setAttributes($_GET['Booking']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionServiceReleaseRoomLock() {

        $this->releaseRoom();
    }

    public function actionServicePromotion() {


        $promotionCodeObj = PromotionCode::model()->find(
                array(
                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                    'condition' => 'promotion_code ="' . $_POST['Others']['promotion_code'] . '" AND itinerary_id ="' . $_POST['Itinerary']['itinerary_id'] . '"'
        ));

        if (count($promotionCodeObj) > 0) {

			$startTimeStamp = CDateTimeParser::parse($promotionCodeObj->start_date, Yii::app()->params->dateFormat['compare_day']);
            $endTimeStamp = CDateTimeParser::parse($promotionCodeObj->end_date, Yii::app()->params->dateFormat['compare_day']);

		    if (!Yii::app()->royalCaribbeanHelper->timeStampComparison($startTimeStamp, $endTimeStamp)) {

				Yii::app()->format->jqueryJson('fail', 'The promotion code have been expried!');
            }else if ($promotionCodeObj->quota == 0) {

                Yii::app()->format->jqueryJson('fail', 'The promotion code has no more quota!');
            } else {

                $ItineraryRoomType = ItineraryRoomType::model()->find(
                        array(
                            //'condition' => 'language="' . Yii::app()->params->language . '"',
                            'condition' => 'irt_id ="' . $_POST['ItineraryRoomType']['irt_id'] . '"',
                        )
                );

                $RoomtypePromotioncode = RoomtypePromotioncode::model()->find(
                        array(
                            //'condition' => 'language="' . Yii::app()->params->language . '"',
                            'condition' => 'rt_id ="' . $ItineraryRoomType->rt_id . '" AND promotion_id="' . $promotionCodeObj->promotion_id . '"',
                        )
                );

                $Promotioncode = Promotioncode::model()->find(
                        array(
                            //'condition' => 'language="' . Yii::app()->params->language . '"',
                            'condition' => 'promotion_id="' . $promotionCodeObj->promotion_id . '"',
                        )
                );

                //CVarDumper::dump($Promotioncode, 10, true);

                if (count($RoomtypePromotioncode) > 0) {

                    if ($Promotioncode->itinerary_id == $ItineraryRoomType->itinerary_id) {

                        $itineraryModel = Itinerary::model()->find(
                                array(
                                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                                    'condition' => 'itinerary_id="' . $_POST['Itinerary']['itinerary_id'] . '"',
                        ));
                        //$noOfPeople = $_POST['Others']['adults'] + $_POST['Others']['child'];
                        //$price = Yii::app()->format->calculateInitPrice($noOfPeople, $ItineraryRoomType, $itineraryModel, $promotionCodeObj);
                        Yii::app()->format->jqueryJson('success', $promotionCodeObj);
                        //Yii::app()->format->jqueryJson('success', array('promo'=> $promotionCodeObj, 'price' => $price));
                        // Yii::app()->format->jqueryJson('success', $promotionCodeObj);
                    } else {

						//    Yii::app()->format->jqueryJson('fail', Yii::t('booking', 'That promotion code do not be allowed in this itinerary!'));
						Yii::app()->format->jqueryJson('fail', Yii::t('booking', "Promotion code invalid: \n1. Wrong code or \n2. Stateroom category not applicable. Please try again."));
					}
                } else {

                    //Yii::app()->format->jqueryJson('fail', 'That promotion code do not be allowed in this room type!');
                	Yii::app()->format->jqueryJson('fail', Yii::t('booking', "Promotion code invalid: \n1. Wrong code or \n2. Stateroom category not applicable. Please try again."));
                }
            }
        } else {

            Yii::app()->format->jqueryJson('fail', 'No promotion code result found!');
        }
    }

    /*     * *********************Step one************************ */

    public function actionStepone($id) {

        $this->setLayout();


		if(!empty($_GET['lang'])){

		  $this->redirect(array('stepone', 'id' => $id));
		}

		/*
		$mail = new YiiMailer();
		$mail->setView('testingmail');
		$mail->setData(array( 'content' => 'testing HI' ));
		$mail->setFrom("sales@royalcaribbean.com.hk", "Royal Caribbean");
		$mail->setTo('sai.tai@fevaworks.net');
		$mail->setSubject('Booking Confirmation');
		$mail->send();
		*/

        //***************************Delete Cookies before put something new*****************************
        $booking_cookies = Yii::app()->Cookies->getCMsg('booking');
        if (!empty($booking_cookies)) {
            $this->releaseRoom();
        }
        $this->deleteCookies();



        //echo $id;
        $itineraryModel = Itinerary::model()->with('cruise')->find(
                array(
                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                    'condition' => 't.itinerary_id="' . $id . '"',
        ));

        //$itineraryModel[0]->start_date = CDateTimeParser::parse($itineraryModel[0]->start_date, Yii::app()->params->dateFormat['frontend_time']);
        //CVarDumper::dump($itineraryModel, 10, true);
        //$currentDateTimestamp = time();

        $roomModel = ItineraryRoomType::model()->with('rt')->findAll(
                array(
                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                    'condition' => 't.itinerary_id="' . $id . '"',
                    'order' => 'fare_guest1_2',
                //. '" AND start_date < "' . $currentDateTimestamp
                // . '" AND end_date > "' . $currentDateTimestamp . '"',
        ));

        //CVarDumper::dump($itineraryModel, 10, true);
        //CVarDumper::dump($roomsModelData, 10, true);
        //CVarDumper::dump(Yii::app()->format->calculatePrice(1, $roomModel[0], $itineraryModel), 10, true);
        //CVarDumper::dump(count($itineraryModel), 10, true);
        //CVarDumper::dump(count($roomModel), 10, true);
        //CVarDumper::dump($roomModel, 10, true);
		//exit();

        if (!count($itineraryModel) == 0) {

            if (!count($roomModel) == 0) {


                Yii::app()->session->clear();
                Yii::app()->session->destroy();
                $calculated_Object = Yii::app()->format->calculatePrice(1, $roomModel[0], $itineraryModel);
                //CVarDumper::dump($calculated_Object, 10, true);
                //exit();

                $this->render('front-end/stepone', array(
                    'bookingModel' => Booking::model(),
                    'model' => $itineraryModel,
                    'roomModel' => ItineraryRoomType::model(),
                    'promoModel' => PromotionCode::model(),
                    'roomsModelData' => $roomModel,
                    'totalPrice' => $calculated_Object['sum'],
                        //'noMoreRoomInvertory' => $noMoreRoomInvertory
                        )
                );
            } else {
                $this->render('front-end/404', array('error' => 'There are no staterooms in this itinerary "' . $itineraryModel->itinerary_name . '" yet.'));
            }
        } else {
            $this->render('front-end/404', array('error' => 'Itinerary not found.'));
        }

        /*
          $this->render('view', array(
          'model' => $this->loadModel($id),
          )); */
    }

// Set cookies
    public function actionStepOneB() {

        $this->setLayout();
        $id = $_GET['Itinerary']['itinerary_id'];
        $_GET['Others']['price'] = Yii::app()->format->formatNumber($_GET['Others']['price']);
        $_GET['Others']['total_guest'] = $_GET['Others']['adults'] + $_GET['Others']['child'];
        $promotionCodeObj = null;

        $itineraryModel = Itinerary::model()->with('cruise')->find(
                array(
                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                    'condition' => 't.itinerary_id="' . $id . '"',
        ));

        $ItineraryRoomType = ItineraryRoomType::model()->with('rt')->find(
                array(
                    //'condition' => 'language="' . Yii::app()->params->language . '"',
                    'condition' => 't.irt_id="' . $_GET['ItineraryRoomType']['irt_id'] . '"',
        ));

        // Verify the total_guest from $GET is over the room capacitiy or not by this IF case
        if($_GET['Others']['total_guest'] > $ItineraryRoomType['rt']->rt_capacity){
            header('Location: /');
        }


        //******************************Check promotion code************************************
        if (isset($_GET['Others']['promotion_code'])) {
            $promotionCodeObj = PromotionCode::model()->find(
                    array(
                        'condition' => 'promotion_code ="' . $_GET['Others']['promotion_code'] . '" AND itinerary_id ="' . $_GET['Itinerary']['itinerary_id'] . '"',
            ));
            if (!($this->checkPromotionCode($promotionCodeObj, $ItineraryRoomType))) {
                $promotionCodeObj = null;
            } else {
                Yii::app()->Cookies->putCMsg(
                        'booking_promotion', array(
                    $_GET['Others']['promotion_code'],
                    $promotionCodeObj->promotion_name,
                        ), time() + 60 * 60 * 24 //24hr
                );
            }
        }


        //******************************Set booking code************************************
        Yii::app()->Cookies->putCMsg('booking', array(
            $id, //itinerary_id
            $_GET['ItineraryRoomType']['irt_id'],
            $ItineraryRoomType->rt_id,
                ), time() + 60 * 60 * 24 //24hr
        );
        Yii::app()->Cookies->putCMsg('booking_display', array(
            $itineraryModel->port_of_departure,
            $itineraryModel->itinerary_name,
            Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['display_StepLong'], CDateTimeParser::parse($itineraryModel->start_date, 'dd/MM/yyyy')),
            Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['display_StepLong'], CDateTimeParser::parse($itineraryModel->end_date, 'dd/MM/yyyy')),
            $_GET['Others']['adults'],
            $_GET['Others']['child'],
            $itineraryModel['cruise']->cruise_name,
            $ItineraryRoomType['rt']->rt_name,
            $_GET['Others']['price'],
            $itineraryModel->ports_of_calls,
            $itineraryModel->days_nights_full_desc,
                ), time() + 60 * 60 * 24 //24hr
        );
        Yii::app()->Cookies->putCMsg('booking_display_zh_tw', array(
            $itineraryModel->port_of_departure_tc,
            $itineraryModel->itinerary_name_tc,
            Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['display_StepLong_TC'], CDateTimeParser::parse($itineraryModel->start_date, 'dd/MM/yyyy')),
            Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['display_StepLong_TC'], CDateTimeParser::parse($itineraryModel->end_date, 'dd/MM/yyyy')),
            $_GET['Others']['adults'],
            $_GET['Others']['child'],
            $itineraryModel['cruise']->cruise_name_tc,
            $ItineraryRoomType['rt']->rt_name_tc,
            $_GET['Others']['price'],
            $itineraryModel->ports_of_calls,
            $itineraryModel->days_nights_full_desc_tc,
                ), time() + 60 * 60 * 24 //24hr
        );
        //$cookie_booking->expire = time()+60*60*24*180;
        //$cookieCollection['name'] = new CHttpCookie('name', 'value', $options);
        //CVarDumper::dump(Yii::app()->Cookies->getCMsg('booking'), 10, true);
        //CVarDumper::dump(Yii::app()->Cookies->getCMsg('booking_promotion'), 10, true);

        if (!count($itineraryModel) == 0) {
            //$totalPrice = Yii::app()->format->calculateInitPrice(1, $roomModel, $itineraryModel);
            $this->render('front-end/steponeb', array(
                'bookingModel' => Booking::model(),
                'itineraryModel' => $itineraryModel,
                'roomModelData' => $ItineraryRoomType,
                'promotionCode' => $promotionCodeObj,
                'others' => $_GET['Others'])
            );
        } else {
            $this->render('front-end/404');
        }
    }

    public function actionSteptwo() {

        $this->setLayout();
        $formModel = new Guest('session');
        $cookie_booking = Yii::app()->Cookies->getCMsg('booking');
        $cookies = $this->getCookiesDisplay();

        /*
          $itineraryModel = Itinerary::model()->with('cruise')->find(
          array(
          //'condition' => 'language="' . Yii::app()->params->language . '"',
          'condition' => 't.itinerary_id="' . $cookie_booking[3] . '"',
          ));
         */

        $guestModels = array();
        $all_valid = true;

        if (isset($_POST['Others']['ajax'])) {
		//var_dump($_POST);
		//exit();
            // $this->performAjaxValidation($formModel);
            //$model->attributes = $_POST['Guest'];
            foreach ($_POST['Guest'] as $key => $guestForm) {

                //http://stackoverflow.com/questions/17835854/model-validation-always-return-false-in-yii
                $guestModel = new Guest('session');
                $guestModel->attributes = $guestForm;
                $guestModels[$key] = $guestModel;
                $valid = $guestModel->validate();

                //CVarDumper::dump($guestModel->validate(), 10, true);
                //CVarDumper::dump($guestModel->getErrors(), 10, true);
                if (!$valid) {

                    //CVarDumper::dump($guestModel->getErrors(), 10, true);
                    $all_valid = false;
                }
            }

            if (!$all_valid) {

                //$guestModels
                //$guestModel = new Guest('session');
                //echo CJSON::encode(array('result' => 'successful', 'data' => $data));
                //CVarDumper::dump($cookies, 10, true);
                //CTheme::getViewFile($this, 'front-end/steptwo')
                $reserviced_roomInventory = RoomInventory::model()->find(
                        array(
                            'condition' => 'itinerary_id="' . $cookie_booking[0] .
                            '" AND rt_id="' . $cookie_booking[2] .
                            '" AND booking_ip="' . CHttpRequest::getUserHostAddress() .
                            '" AND status="locked"',
                            'limit' => 1
                        )
                );
                Yii::app()->session['guestModels'] = $guestModels;
                $this->renderPartial('front-end/steptwo', array(
                    'cookies' => $cookies,
                    'itineraryModel' => Itinerary::model(),
                    'formModel' => $formModel,
                    'formModelData' => $guestModels,
                    'twentyTimeStamp' => $reserviced_roomInventory->update_time
                        )
                );
                Yii::app()->end();
            } else {
                Yii::app()->session['guestModels'] = $guestModels;
                echo 'scuessful';
                //$this->redirect(array('Booking/stepThree'));
            }


            //function_exists('json_encode') ? json_encode($result) : CJSON::encode($result);
        } else {


            //check if there are any room provided ?
            $roomInventory = RoomInventory::model()->find(
                    array(
                        'condition' => 'itinerary_id="' . $cookie_booking[0] .
                        '" AND rt_id="' . $cookie_booking[2] .
                        '" AND status="available"',
                        'limit' => 1
                    )
            );

            //check if there are a room reserviced ????
            $reserviced_roomInventory = RoomInventory::model()->find(
                    array(
                        'condition' => 'itinerary_id="' . $cookie_booking[0] .
                        '" AND rt_id="' . $cookie_booking[2] .
                        '" AND booking_ip="' . CHttpRequest::getUserHostAddress() .
                        '" AND status="locked"',
                        'limit' => 1
                    )
            );

            if (count($reserviced_roomInventory) > 0) {
                if ($reserviced_roomInventory->update_time - time() > 0) {

                    $this->render('front-end/steptwo', array(
                        'cookies' => $cookies,
                        'itineraryModel' => Itinerary::model(),
                        'formModel' => $formModel,
                        'formModelData' => Yii::app()->session['guestModels'],
                        'twentyTimeStamp' => $reserviced_roomInventory->update_time
                            )
                    );
                } else {
                    //Check any rooms available!!
                    if (count($reserviced_roomInventory) > 0) {
                        $this->releaseRoom($reserviced_roomInventory);
                    }

                    $this->deleteCookies();
                    Yii::app()->session->clear();
                    Yii::app()->session->destroy();
                    //$this->redirect(array('stepone', 'id' => $cookie_booking[0], 'noMoreRoomInvertory' => $cookies[7]));   // If no room avaiable + no room locked by this IP, retrun to step one!!
                    $this->redirect(array('stepone', 'id' => $cookie_booking[0]));   // If no room avaiable + no room locked by this IP, retrun to step one!!
                }
            } else if (count($roomInventory) > 0) {

                //$twentyTimeStamp = strtotime('+20 minutes GMT +0800');
                //$twentyTimeStamp = strtotime('+60 seconds');
                $twentyTimeStamp = strtotime('+20 minutes');
                $roomInventory->update_time = $twentyTimeStamp;
                $roomInventory->booking_ip = CHttpRequest::getUserHostAddress();
                $roomInventory->status = 'locked';
                $reservation_code = ReservationCode::model()->getNewId($twentyTimeStamp);
                if ($reservation_code !== false) {
                    $roomInventory->reservation_code = $reservation_code;
                }
                $roomInventory->update();


                Yii::app()->Cookies->updateCMsg('booking', $roomInventory->room_inventory_id);
                $this->render('front-end/steptwo', array(
                    'cookies' => $cookies,
                    'itineraryModel' => Itinerary::model(),
                    'formModel' => $formModel,
                    'formModelData' => Yii::app()->session['guestModels'],
                    'twentyTimeStamp' => $twentyTimeStamp
                        )
                );
            }

        }
    }

    public function actionStepThree() {

        $this->setLayout();
        $booking_display = $this->getCookiesDisplay();
        $booking_promotion = Yii::app()->Cookies->getCMsg('booking_promotion');

        $cookies['display'] = $booking_display;
        $cookies['promotion'] = $booking_promotion;
        $cookie_booking = Yii::app()->Cookies->getCMsg('booking');
        //CVarDumper::dump(Yii::app()->session['guestModels'], 10, true);
        //CVarDumper::dump($cookie_booking, 10, true);
        //$roomInventory = RoomInventory::model()->findByPk($cookie_booking[2]);
        $roomInventory = RoomInventory::model()->find(
                array(
                    'condition' => 'itinerary_id="' . $cookie_booking[0] .
                    '" AND rt_id="' . $cookie_booking[2] .
                    '" AND booking_ip="' . CHttpRequest::getUserHostAddress() .
                    '" AND status="locked"',
                    'limit' => 1
                )
        );
        /*
          $roomInventory = RoomInventory::model()->find(
          array(
          'condition' => 'itinerary_id="' . $cookie_booking[0] .
          '" AND booking_ip="' . CHttpRequest::getUserHostAddress() .
          '" AND status="locked"',
          'limit' => 1
          )
          );
         */


        $this->render('front-end/stepthree', array(
            'cookies' => $cookies,
            'cruiseModel' => Cruise::model(),
            'promoModel' => PromotionCode::model(),
            'guestModel' => Guest::model(),
            'itineraryModel' => Itinerary::model(),
            'session_guestModels' => Yii::app()->session['guestModels'],
            'twentyTimeStamp' => $roomInventory->update_time
                )
        );
    }

    public function actionStepFour() {
        $this->setLayout();

        $booking_display = $this->getCookiesDisplay();
        $booking_promotion = Yii::app()->Cookies->getCMsg('booking_promotion');
        $booking_main = Yii::app()->Cookies->getCMsg('booking');
        $cookies['display'] = $booking_display;
        $cookies['promotion'] = $booking_promotion;
        $no_of_guest = count(Yii::app()->session['guestModels']);
        $now_timeStamp = strtotime('now');


        try {
            $itineraryModel = Itinerary::model()->findByPk($booking_main[0]);
            $itineraryRoomType_Model = ItineraryRoomType::model()->with('rt')->find(
                    array(
                        //'condition' => 'language="' . Yii::app()->params->language . '"',
                        'condition' => 't.irt_id="' . $booking_main[1] . '"',
            ));
            $promotionCodeObj = PromotionCode::model()->find(
                    array(
                        'condition' => 'promotion_code ="' . $booking_promotion[0] . '" and itinerary_id= "' . $booking_main[0] . '"',
            ));
            if (!($this->checkPromotionCode($promotionCodeObj, $itineraryRoomType_Model))) {
                $promotionCodeObj = null;
            }
            $calculated_Object = Yii::app()->format->calculatePrice($no_of_guest, $itineraryRoomType_Model, $itineraryModel, $promotionCodeObj);

            $reserviced_roomInventory = RoomInventory::model()->find(
                    array(
                        'condition' => 'itinerary_id="' . $booking_main[0] .
                        '" AND rt_id="' . $booking_main[2] .
                        '" AND booking_ip="' . CHttpRequest::getUserHostAddress() .
                        '" AND status="locked"',
                        'limit' => 1
                    )
            );

            if (count($reserviced_roomInventory) <= 0 || empty($reserviced_roomInventory)) {
                //Check any rooms available!!
                if (count($reserviced_roomInventory) > 0) {
                    $this->releaseRoom($reserviced_roomInventory);
                }

                $this->deleteCookies();
                Yii::app()->session->clear();
                Yii::app()->session->destroy();
                //$this->redirect(array('stepone', 'id' => $cookie_booking[0], 'noMoreRoomInvertory' => $cookies[7]));   // If no room avaiable + no room locked by this IP, retrun to step one!!
                $this->redirect(array('stepone', 'id' => $booking_main[0]));   // If no room avaiable + no room locked by this IP, retrun to step one!!
            }

            $formError = array(
                "card_type" => array("error" => 0),
                "card_family_name" => array("error" => 0),
                "card_given_name" => array("error" => 0),
                "card_number" => array("error" => 0),
                "expire_month" => array("error" => 0),
                "expire_year" => array("error" => 0),
                "submit" => array("error" => 0, "message" => "")
            );
            $formValid = true;

            if (empty($reserviced_roomInventory->reservation_code) || $reserviced_roomInventory->reservation_code == "") {
                $formValid = false;
                $formError["submit"]["error"] = 1;
                $formError["submit"]["message"] = Yii::t('booking', 'Payment failed, please try again later or contact us.');
            }

            //Form post back process
            if (isset($_POST["card-form-submition"])) {
                $cardType = isset($_POST["card_type"]) ? $_POST["card_type"] : "";
                $cardFamilyName = $_POST["card_family_name"];
                $cardGivenName = $_POST["card_given_name"];
                $cardNumber = $_POST["card_number"];
                $cardMonth = $_POST["expire_month"];
                $cardYear = $_POST["expire_year"];
                if (empty($cardType) || $cardType == "") {
                    $formError["card_type"] = array(
                        "error" => 1
                    );
                    $formValid = false;
                }
                if (empty($cardFamilyName) || $cardFamilyName == "") {
                    $formError["card_family_name"] = array(
                        "error" => 1
                    );
                    $formValid = false;
                }
                if (empty($cardGivenName) || $cardGivenName == "") {
                    $formError["card_given_name"] = array(
                        "error" => 1
                    );
                    $formValid = false;
                }
                if (empty($cardNumber) || $cardNumber == "") {
                    $formError["card_number"] = array(
                        "error" => 1
                    );
                    $formValid = false;
                } else {
                    if (!is_numeric($cardNumber)) {
                        $formError["card_number"] = array(
                            "error" => 2
                        );
                        $formValid = false;
                    }
                }
                if (empty($cardMonth) || $cardMonth == "") {
                    $formError["expire_month"] = array(
                        "error" => 1
                    );
                    $formValid = false;
                }
                if (empty($cardYear) || $cardYear == "") {
                    $formError["expire_year"] = array(
                        "error" => 1
                    );
                    $formValid = false;
                }

                if ($formValid) {
                    //check if there are a room reserviced ????

                    if (count($reserviced_roomInventory) > 0) {
                        if ($reserviced_roomInventory->update_time - time() > 0) {
                            $reservation_code = $reserviced_roomInventory->reservation_code;
                            //$reservation_code = "2854364";

                            $retrieveResponse = RoomInventory::model()->retrieveBooking($reservation_code);
                            if ($retrieveResponse["status"]) {

                                //$paymentResponse = RoomInventory::model()->makePayment($reservation_code, $cardType, $cardFamilyName . ", " . $cardGivenName, $cardNumber, $cardYear, $cardMonth, $calculated_Object['sum']);
                                $paymentResponse = RoomInventory::model()->makePayment($reservation_code, $cardType, $cardFamilyName . ", " . $cardGivenName, $cardNumber, $cardYear, $cardMonth, str_replace(",", "", $cookies['display'][8]));
                                //$paymentResponse = RoomInventory::model()->makePayment($reservation_code, $cardType, $cardFamilyName . ", " . $cardGivenName, $cardNumber, $cardYear, $cardMonth, str_replace(",", "", $cookies['display'][8]));
                                if ($paymentResponse["status"]) {
											/**/

									//Testing Code
									/*
									$paymentResponse["code"] = 'code_ABCDE';
									$paymentResponse["reservationID"] = 'reservationID_ABCDE';
									$paymentResponse["org_xml"] = 'org_xml_ABCDE';
									*/


                                    /* Start make booking to db */

									$criteria = new CDbCriteria;
                                    $criteria->addCondition("reservation_id LIKE '%" . $reservation_code . "'");
                                    ReservationCode::model()->updateAll(
                                            array(
                                        'update_time' => $now_timeStamp,
                                        'status' => 1
                                        ), $criteria
                                    );




                                    $criteria = new CDbCriteria;
                                    $criteria->addCondition("itinerary_id LIKE '%" . $booking_main[0] . "'");
                                    $criteria->addCondition('room_inventory_id = ' . $booking_main[3]);
                                    $criteria->addCondition("booking_ip LIKE '%" . CHttpRequest::getUserHostAddress() . "'");
                                    $criteria->addCondition("status LIKE '%locked%'");
                                    RoomInventory::model()->updateAll(
                                            array(
                                        //'update_time' => strtotime('now GMT +0800'),
                                        'update_time' => $now_timeStamp,
                                        'status' => 'payment_successful'
                                            ), $criteria
                                    );


                                    //Star of create booking record.
                                    $booking_item = new Booking;
                                    //$booking_item->booking_time = strtotime('now GMT +0800');
                                    $refNumber = 'RCI-' . date('dmY-B-Gis', $now_timeStamp);
                                    $booking_item->booking_id = $refNumber;
                                    //$booking_item->booking_time = date('d/m/Y G:i:s', $now_timeStamp);
                                    $booking_item->booking_time = $now_timeStamp;
                                    $booking_item->ip = CHttpRequest::getUserHostAddress();
                                    $booking_item->no_of_guest = $no_of_guest;
                                    $booking_item->total_payment = $calculated_Object['sum'];
                                    $booking_item->booking_status = 'payment_successful';
                                    $booking_item->promotion_id = (!is_null($promotionCodeObj)) ? $promotionCodeObj->promotion_id : '';
                                    $booking_item->itinerary_id = $booking_main[0];
                                    $booking_item->ref_code = $paymentResponse["code"];
                                    $booking_item->payment_feedback = htmlspecialchars($paymentResponse["org_xml"]);
                                    $booking_item->reservation_id = $paymentResponse["reservationID"];
                                    $booking_item->save();



									$log_model = new Log;
									$log_model->create_date = $now_timeStamp;
									$log_model->category = 'Booking_Payment_log(payment)';
									$log_model->description = $refNumber . ' has completed the payment ' .str_replace(",", "", $cookies['display'][8]);
									$log_model->save();


                                    //Star of guest booking record.
                                    $guestPriceArray = $calculated_Object['guestArray'];
                                    $items = array();
                                    foreach (Yii::app()->session['guestModels'] as $key => $guestModel) {

                                        //$guest_item->setAttributes($guestModel);
                                        $guest_item = new Guest;
                                        $guest_item->title = $guestModel->title;
                                        $guest_item->first_name = $guestModel->first_name;
                                        $guest_item->middle_name = $guestModel->middle_name;
                                        $guest_item->last_name = $guestModel->last_name;
                                        $guest_item->gender = $guestModel->gender;
                                        //$guest_item->document_type = 'Passport';
                                        //$guest_item->document_number = $guestModel->document_number;
                                        $guest_item->date_of_birth = CDateTimeParser::parse($guestModel->date_of_birth, Yii::app()->params->dateFormat['long']);
                                        //$guest_item->date_of_birth = $guestModel->date_of_birth;
                                        $guest_item->phone_no = $guestModel->phone_no;
                                        $guest_item->email = $guestModel->email;
                                        $guest_item->citizenship = $guestModel->citizenship;



                                        $guest_item->cruise_fare = $guestPriceArray[$key]['cruise_fare'];
                                        $guest_item->subtotal = $guestPriceArray[$key]['subtotal'];
                                        $guest_item->tax_fees_port = $calculated_Object['otherPrice'];
                                        if (!empty($guestPriceArray[$key]['discount'])) {
                                            $guest_item->discount = $guestPriceArray[$key]['discount'];
                                        }
                                        //$guest_item->status = '';
                                        $guest_item->assigned_room_id = $booking_main[3];
                                        //$guest_item->allow_personalData = $guestModel;

                                        $guest_item->irt_id = $booking_main[1];
                                        $guest_item->booking_id = $booking_item->booking_id;
                                        $guest_item->promotion_id = (!is_null($promotionCodeObj)) ? $promotionCodeObj->promotion_id : '';
                                        $guest_item->save();
                                        $items[] = array(
                                            "email" => $guestModel->email,
                                            "title" => $guestModel->title,
                                            "first_name" => $guestModel->first_name,
                                            "last_name" => $guestModel->last_name,
                                            // leon 20170301 mail item start
                                            "date_of_birth" =>  $guestModel->date_of_birth,
                                            "gender" => $guestModel->gender,
                                            "citizenship" => $guestModel->citizenship,
                                            "phone_no" => $guestModel->phone_no,
                                            "email" => $guestModel->email,
                                            // leon 20170301 end
                                            "cruise" => Yii::app()->format->formatNumber($guestPriceArray[$key]['cruise_fare']),
                                            "singleSupplement" => (!empty($guestPriceArray[$key]['singleSupplement'])) ? Yii::app()->format->formatNumber($guestPriceArray[$key]['singleSupplement']) : null,
                                            "tax" => Yii::app()->format->formatNumber($calculated_Object['otherPrice']),
                                            "discount" => @Yii::app()->format->formatNumber($guestPriceArray[$key]['discount']),
                                            "subtotal" => Yii::app()->format->formatNumber($guestPriceArray[$key]['subtotal']),
                                        );
                                    }

                                    if (!is_null($promotionCodeObj)) {

                                        $promotionCodeObj->accumulate_quota = ($promotionCodeObj->accumulate_quota) - 1;
                                        $promotionCodeObj->update();
                                    }

                                    $emailData = array(
                                        //'name' => $guestModel->title . ", " . $guestModel->last_name,
                                        'name' => $items[0]["title"] . ", " . $items[0]["last_name"],
                                        'bookingID' => $refNumber,
                                        'reservationID' => $paymentResponse["reservationID"],
                                        'itinerary' => $cookies['display'][1],
                                        'sailing' => $cookies['display'][2] . "<br />" . $cookies['display'][3],
                                        'guest' => "Adults: " . $cookies['display'][4] . "<br />Children: " . $cookies['display'][5],
                                        'ship' => $cookies['display'][6],
                                        'category' => $cookies['display'][7],
                                        'card' => "XXXX-XXXX-XXXX-" . substr($cardNumber, -4),
                                        'promotionCode' => (!is_null($promotionCodeObj)) ? $promotionCodeObj->promotion_name . ' (' . $promotionCodeObj->promotion_code . ')' : 'Not Applicable',
                                        'total' => Yii::app()->format->formatNumber($calculated_Object['sum']),
										'guestPriceArray'=> $guestPriceArray,
                                        'items' => $items,);

									/*
                                    $mail = new YiiMailer();
                                    $mail->setView('toClient');
                                    $mail->setData($emailData);
                                    $mail->setFrom("sales@royalcaribbean.com.hk", "Royal Caribbean");
                                    $mail->setTo($items[0]["email"]);
                                    $mail->setSubject('Booking Confirmation');
                                    $mail->send();
									*/

                                    $mail = new YiiMailer();
                                    $mail->setView('toClient');
                                    $mail->setData($emailData);
                                    $mail->setFrom("sales@royalcaribbean.com.hk", "Royal Caribbean");
                                    $mail->setTo($items[0]["email"]);
                                    $mail->setBcc(array('sales@royalcaribbean.com.hk', 'PTam@RCCLAPAC.com'));
                                    $mail->setSubject('Booking Confirmation');
                                    $mail->send();

                                    $mail2Sale = new YiiMailer();
                                    $mail2Sale->setView('toSale');
                                    $mail2Sale->setData($emailData);
                                    $mail2Sale->setFrom("sales@royalcaribbean.com.hk", "Royal Caribbean");
                                    $mail2Sale->setTo(array('sales@royalcaribbean.com.hk', 'PTam@RCCLAPAC.com'));
                                    $mail2Sale->setCc(array('mng@rcclapac.com'));
                                    $mail2Sale->setSubject('Booking Confirmation(to Sales)');
                                    $mail2Sale->send();


                                    /* $this->deleteCookies();
                                    Yii::app()->session->clear();
                                    Yii::app()->session->destroy();
                                    */

                                    $this->redirect(array('booking/thankyou/code/' . base64_encode($refNumber)));
                                    //$this->redirect(array('booking/thankyou/code/' . base64_encode($paymentResponse["reservationID"])));

                                    // Thank you page requires transaction variables for tracking purposes.
                                    // Move cookie/session deletion after the thank you page.
                                    $this->deleteCookies();
                                    Yii::app()->session->clear();
                                    Yii::app()->session->destroy();

                                    Yii::app()->end();

								} else {
                                    //payment fail
                                    $formValid = false;
                                    $formError["submit"]["error"] = 1;
                                    if ($paymentResponse["message"] == "unknown") {
                                        $formError["submit"]["message"] = Yii::t('booking',
                                            $formError["submit"]["error"][0]
                                            // 'Payment failed, please try again later or contact us.'
                                            );
                                    } else {
                                        $formError["submit"]["message"] = Yii::t('booking', 'ddd'.$paymentResponse["message"]);
                                    }
                                }
                            } else {
                                //RetrieveBooking Error
                                $formValid = false;
                                $formError["submit"]["error"] = 1;
                                $formError["submit"]["message"] = Yii::t('booking',
                                    $retrieveResponse["message"]
                                    // 'ddddPayment failed, please try again later or contact us.'
                                    );
                            }

                        } else {
                            //Check any rooms available!!
                            if (count($reserviced_roomInventory) > 0) {
                                $this->releaseRoom($reserviced_roomInventory);
                            }

                            $this->deleteCookies();
                            Yii::app()->session->clear();
                            Yii::app()->session->destroy();
                            //$this->redirect(array('stepone', 'id' => $cookie_booking[0], 'noMoreRoomInvertory' => $cookies[7]));   // If no room avaiable + no room locked by this IP, retrun to step one!!
                            $this->redirect(array('stepone', 'id' => $booking_main[0]));   // If no room avaiable + no room locked by this IP, retrun to step one!!
                        }
                    }
                }
            }


			$log_model = new Log;
			$log_model->create_date = $now_timeStamp;
			$log_model->category = 'Booking_Payment_log(booking)';
			$log_model->description = $booking_main[0] .','. $booking_main[1] .','. $booking_main[2];// .','. $booking_main[3];
			$log_model->save();

			if(!empty($booking_promotion[0])){

				$log_model = new Log;
				$log_model->create_date = $now_timeStamp;
				$log_model->category = 'Booking_Payment_log(promotion)';
				$log_model->description = $booking_promotion[0];
				$log_model->save();
			}

            foreach (Yii::app()->session['guestModels'] as $key => $guestModel) {

				$log_model = new Log;
				$log_model->create_date = $now_timeStamp;
				$log_model->category = 'Booking_Payment_log(Guest)';
				$log_model->description =
				$guestModel->title .',' . $guestModel->first_name .',' . $guestModel->last_name
				.',' . $guestModel->date_of_birth  .',' . $guestModel->email .',' .$guestModel->phone_no .',' . $guestModel->citizenship;
				$log_model->save();
			}




            $this->render('front-end/stepfour', array(
                'cookies' => $cookies,
                'cruiseModel' => Cruise::model(),
                'promoModel' => PromotionCode::model(),
                'itineraryModel' => Itinerary::model(),
                'formError' => $formError,
                'formValid' => $formValid,
                    )
            );
        } catch (CException $ex) {

            //$this->render('front-end/404', array('error' => $ex));
            $this->render('front-end/404', array('error' => 'Unexpected error is occured, Please try again later.<br/>' . Yii::app()->createUrl('booking/stepthree')));
            Yii::app()->end();
        }
    }

    public function actionThankyou($code) {
        $this->setLayout();
        $this->render('front-end/thankyou', array('code' => base64_decode($code)));
    }

    public function actionDownloadExcel() {

        //$model = new Booking('search');
        // $dataProvider = new CActiveDataProvider('Booking');

        Yii::import('ext.phpexcel.XPHPExcel');
        $objPHPExcel = XPHPExcel::createPHPExcel();
        $objPHPExcel->getProperties()->setCreator("SaiTai - arictai5@gmail.com")
                ->setLastModifiedBy("Sai Tai")
                ->setTitle("Manifest Upload")
                ->setSubject("Office 2007 XLSX Test Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Test result file");

        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'Reservation ID');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, 'Booking Time');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, 'OCCUPANCY');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 1, 'Itinerary Code');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, 1, 'Stateroom Cat ID');
        $startCol = 3;
        for ($i = 1; $i <= 4; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_LAST_NAME');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_FIRST_NAME');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_email');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_phone');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_DOB');
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_GENDER');
            // $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_DINING');
            // $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_AIR');
            // $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_CTZ');
            // $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_AGE');
            // $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(++$startCol, 1, 'GUEST_' . $i . '_AGE_RANGE');
        }


        $row = 2; // 1-based index
        $allBooking = Booking::model()->findAll(
            array('order'=>'booking_time DESC')
        );
        $occupancy = array('S', 'D', 'T', 'Q');
        foreach ($allBooking as $bookingItem) {
            $col = 3;

            $allGuest = Guest::model()->findAll(
                    array(
                        'condition' => 'booking_id="' . $bookingItem->booking_id . '"',
                    //'group' => 'booking_id',
                    )
            );
            if (!empty($allGuest)) {
                $itineraryRoomType = ItineraryRoomType::model()->with('rt')->findAll(
                        array(
                            'condition' => 'irt_id="' . $allGuest[0]->irt_id . '"',
                        )
                );

                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $bookingItem->reservation_id);
				//mail('itang@bmgww.com', 'RCC', $itineraryRoomType[0]['rt']->rt_name);
                $no_allGuest = count($allGuest) - 1;
				if($no_allGuest >= 4){
					$no_allGuest = 3;
				}
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, date('d/m/Y H:i:s', $bookingItem->booking_time) ); //Leon changed time format
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $occupancy[$no_allGuest]);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $bookingItem->itinerary_id);
				//echo($itineraryRoomType[0]['rt']->rt_name);
				//exit();
				//CVarDumper::dumpAsString('testtest'.$itineraryRoomType[0]['rt']->rt_name, 10, false);
				//$cabin_array = array();
				$cabin_id = "";
				$cabin_name = "";
				if (isset($itineraryRoomType[0])){
					$cabin_id = $itineraryRoomType[0]['rt']->attributes['rt_id'];
					$cabin_name = $itineraryRoomType[0]['rt']->attributes['rt_name'];
				} else {
					// CVarDumper::dump($itineraryRoomType, 10, false);
					// exit();
					$cabin_id = "-";
					$cabin_name = "-";
				}
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $cabin_id .' : '. $cabin_name);
				//array_push($cabin_array, $cabin_id.' '.$cabin_name);
				//echo ($cabin_id);
				//echo ($cabin_name);
                //$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $cabin_id .' : '. $cabin_name);

                foreach ($allGuest as $item) {

                    //CVarDumper::dump($item, 10, true);
                    //CVarDumper::dump($row->last_name, 10, true);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( ++$col, $row, $item->last_name);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( ++$col, $row, $item->first_name);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( ++$col, $row, $item->email);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( ++$col, $row, $item->phone_no);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( ++$col, $row, $item->date_of_birth);
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( ++$col, $row, $item->gender);
                    // $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow( ++$col, $row, '');
                    /*
                      $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
                      $col++;
                      $row++;
                     */
                }
                $row++;
                // $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(29, $row, $bookingItem->booking_time);
            }
            //CVarDumper::dump($bookingItem->booking_id, 10, true);
        }
// Add some data
        /*


          // Miscellaneous glyphs, UTF-8
          $objPHPExcel->setActiveSheetIndex(0)
          ->setCellValue('A4', 'Miscellaneous glyphs')
          ->setCellValue('A5', 'Ã©Ã Ã¨Ã¹Ã¢ÃªÃ®Ã´Ã»Ã«Ã¯Ã¼Ã¿Ã¤Ã¶Ã¼Ã§');
         */

// Rename worksheet
        // $objPHPExcel->getActiveSheet()->setTitle('Simple');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Manifest Upload ' . date("Y-m-d") . '.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        Yii::app()->end();
    }

    protected function checkPromotionCode($promotionCodeObj, $ItineraryRoomType) {

        if (count($promotionCodeObj) > 0 && $promotionCodeObj->quota > 0) {

            $RoomtypePromotioncode = RoomtypePromotioncode::model()->find(
                    array(
                        'condition' => 'rt_id ="' . $ItineraryRoomType->rt_id . '" AND promotion_id="' . $promotionCodeObj->promotion_id . '"',
                    )
            );

            if (count($RoomtypePromotioncode) > 0) {

                $itineraryModel = Itinerary::model()->find(
                        array(
                            'condition' => 'itinerary_id="' . $ItineraryRoomType->itinerary_id . '"',
                ));
                //$noOfPeople = $_GET['Others']['adults'] + $_GET['Others']['child'];
                return true;
            }
        }

        return false;
    }

    protected function performAjaxValidation($model) {



        //echo CActiveForm::validate($model);
        //Yii::app()->end();
    }

    public function setLayout() {

        if (Yii::app()->language == 'en') {

            $this->layout = '//layouts/frontend';
        } else if (Yii::app()->language == 'zh_tw') {

            $this->layout = '//layouts/frontend_tc';
        }

        Yii::app()->clientScript->scriptMap = array(
            'jquery.js' => false,
        );
        /**/
    }

    protected function releaseRoom($roomInventory = null) {

        $roomInventory = 0;
        if (empty($roomInventory)) {

            //Created this cookies at actionStepOneB
            $cookie_booking = Yii::app()->Cookies->getCMsg('booking');
            $roomInventory = RoomInventory::model()->find(
                    array(
                        //'condition' => 'room_inventory_id="' . $cookie_booking[2] .
                        'condition' => 'booking_ip="' . CHttpRequest::getUserHostAddress() .
                        '" AND status="locked"',
                        'limit' => 1
                    )
            );
        }

        if (count($roomInventory) > 0 || !empty($roomInventory)) {

            if ($roomInventory->reservation_code != "") {
                $reservation_code = ReservationCode::model()->find(
                        array(
                            'condition' => 'reservation_id = "' . $roomInventory->reservation_code . '"',
                            'limit' => 1
                        )
                );
                $reservation_code->status = 0;
                $reservation_code->update();
            }
            $roomInventory->update_time = 0;
            $roomInventory->booking_ip = '';
            $roomInventory->status = 'available';
            $roomInventory->reservation_code = "";
            $roomInventory->update();
            $this->deleteCookies();
        }
    }

    protected function deleteCookies() {

        Yii::app()->Cookies->delCMsg('booking_promotion');
        Yii::app()->Cookies->delCMsg('booking');
        Yii::app()->Cookies->delCMsg('booking_display');
        Yii::app()->Cookies->delCMsg('booking_display_zh_tw');
    }

    protected function getCookiesDisplay() {


        if (Yii::app()->language == 'zh_tw') {
            return Yii::app()->Cookies->getCMsg('booking_display_zh_tw');
        } else {
            return Yii::app()->Cookies->getCMsg('booking_display');
        }
    }

    /*     * ******************Set Cookies***********************

      public function hasCookie($name) {
      return !empty(Yii::app()->request->cookies[$name]->value);
      }

      public function getCookie($name) {
      return Yii::app()->request->cookies[$name]->value;
      }

      public function setCookie($name, $value, $time = 0, $disableClientCookies = false) {
      $cookie = new CHttpCookie($name, $value);
      $cookie->expire = time() + $time;
      $cookie->httpOnly = $disableClientCookies;
      Yii::app()->request->cookies[$name] = $cookie;
      }

      public function removeCookie($name) {
      unset(Yii::app()->request->cookies[$name]);
      }
     */
}
