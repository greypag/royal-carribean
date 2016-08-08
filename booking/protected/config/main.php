<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Royal Caribbean Reservation Management System',
    // preloading 'log' component
    'timeZone' => 'Asia/Hong_Kong',
    'sourceLanguage' => 'en',
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        //My extensions
        'ext.YiiMailer.YiiMailer',  //http://www.yiiframework.com/extension/yiimailer/
        'ext.tinymce.*',
        'ext.giix-components.*', // giix components
    //'ext.EFineUploader.*', // giix components
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'importcsv' => array(
            'path' => 'upload/importCsv/', // path to folder for saving csv file and file with import params
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', '192.168.*.*'),
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
            ),
        ),
    ),
    // application components
    'components' => array(
        'royalCaribbeanHelper' => array(
            'class' => 'ext.components.RoyalCaribbeanHelper',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
            //'<controller:\w+>/<id:\d+>' => '<controller>/view',
            //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            //'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    //http://www.yiiframework.com/wiki/114/how-to-log-and-debug-variables-using-cweblogroute/
                    'class' => 'CFileLogRoute',
                    'categories' => 'bookingActivity',
                    //'categories' => "system.*",
                    'logPath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../upload/log',
                    //'logFile' => 'traceBooking('. date('d-m-y') . ').log' ,
                    'logFile' => 'traceBooking(' . date('d-m') . ').log',
                    'levels' => 'trace',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'format' => array(
            'class' => 'application.components.Formatter',
        //'priceFormat' => array('decimals' => 3, 'decimalSeparator' => ',', 'thousandSeparator' => '-'),
        ),
        'Cookies' => array('class' => 'application.components.CookiesHelper'),
        'session' => array(
            'autoStart' => false,
            'cookieMode' => 'only',
        /*
          'cookieParams' => array(
          'httponly' => false,
          ), */
        // 'savePath' => '/path/to/new/directory',  Sai: 係Server 邊到save 住
        ),
    /*
     * Sai created
      'clientScript'=>array(
      'packages'=>array(
      'jquery'=>array(
      'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/1.11.2/',
      'js'=>array('jquery.min.js'),
      )
      ),
      ),

      'clientScript' => array(
      'scriptMap' => array(
      'jquery.js' => false,
      ),
      ), */
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'language' => 'en',
        'adminEmail' => 'webmaster@example.com',
        'url_ImagePath' => 'upload/image',
        'url_PDFPath' => 'upload/pdf',
        //'url_LogBookingPath' => $this->getBaseUrl(true). DIRECTORY_SEPARATOR . "upload/log",
        'upload_ImagePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../upload/image',
        'upload_PDFPath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../upload/pdf',
        //'fronEnd_path' => Yii::app()->getBaseUrl(true) ,
        'dateFormat' => array(
            //'frontend_time' => 'dd/mm/yy',
            'long' => 'dd/MM/yyyy',
            'display_long' => 'dd/mm/yy',
            'display_StepLong' => 'dd MMM yyyy',
            'display_StepLong_TC' => 'yyyy年MM月dd日',
            'compare_day' => 'dd/M/yyyy',
            //'long_time' => 'dd/mm/yy kk:mm',
            'long_time' => 'dd/MM/yyyy HH:mm:ss',
        ),
        'CGridViewPagination' => array(
            'defaultPageSize' => 20,
            'pageSizeOptions' => array(10 => 10, 20 => 20, 50 => 50, 100 => 100),
        ),
    ),
);
