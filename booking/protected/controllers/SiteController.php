<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */

    public function filters() {
        return array(
            'accessControl',
        );
    }

		 /*
    public function accessRules() {
        return array(
            array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('login'),
				'ips' => array('127.0.0.1', '218.103.122.34'),
			    //
                //'users' => array('admin'),
            ),
            array(
				'deny', // deny all users
                'actions' => array('login'),
				'ips' => array('*'),
                //'users' => array('*'),
            ),
        );
    }
	*/
	
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {

                $this->layout = '//layouts/frontend';
                //  $this->render('error', $error); 
                //CVarDumper::dump($error, 10, true);
                $this->render('//booking/front-end/404', array('error' => $error['message']));
            }
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        //CVarDumper::dump($model->validate(), 10, true);
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {

                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
		
		
		$this->render('login', array('model' => $model));
		
		// if( 
		   // CHttpRequest::getUserHostAddress() == '218.103.122.34' //Fevaworks IP
		// || CHttpRequest::getUserHostAddress() == '12.43.115.237'
		// || CHttpRequest::getUserHostAddress() == '218.255.135.27'
		// || CHttpRequest::getUserHostAddress() == '103.253.8.134'
		// || CHttpRequest::getUserHostAddress() == '61.244.243.238'
		// || CHttpRequest::getUserHostAddress() == '12.43.115.236'
        // || CHttpRequest::getUserHostAddress() == '61.244.249.166'
        // || CHttpRequest::getUserHostAddress() == '203.186.82.202'
        // || CHttpRequest::getUserHostAddress() == '210.6.226.142'
		// ){
// 		
			// // display the login form
			// $this->render('login', array('model' => $model));
		// }else{
			// $this->redirect('/');
		// }
		
		
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {

        Yii::app()->user->logout();
        //$model = new LoginForm;
        //$this->render('login', array('model' => $model));
        // $this->redirect(Yii::app()->user->returnUrl);
        $this->redirect(Yii::app()->homeUrl);
    }

}
