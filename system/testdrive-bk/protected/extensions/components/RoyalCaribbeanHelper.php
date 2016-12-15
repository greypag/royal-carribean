<?php

//class RoyalCaribbeanHelper extends CWidget {
class RoyalCaribbeanHelper extends CWidget {

    //public $sizeLimit = null;
    //public $sizeLimit =  10000 ;//2 * 1024 * 1024;
    //protected $allowedExtensions = array();
    /*
      public function init() {
      $sizeLimit = 2 * 1024 * 1024; //maximum file size in bytes
      }

     */
    function __construct() {
        //$this->set_sizeLimit(2 * 1024 * 1024); //maximum file size in bytes
        // $this->$sizeLimit = 2 * 1024 * 1024; //maximum file size in bytes
    }

    public function echo_AjaxFileUpload($controller, $type, $filename) {

        $sizeLimit = $this->checkFileLimit($type); //maximum file size in bytes
        //CVarDumper::dump( $filename , 10, true);
        //CVarDumper::dump( Yii::app()->createAbsoluteUrl(lcfirst($controller) . '/upload', array('type' => $type)) , 10, true);

		$image_script = '';
        if ($type == 'image') {
			$image_script = "$('#FineUploader_image').siblings('img').attr('src' ,'" . Yii::app()->getBaseUrl(true) . '/'  . $this->checkPath($type) . "'+'/'+response.filename);"; 
		}
        $this->widget('ext.EFineUploader.EFineUploader', array(
            'id' => 'FineUploader_' . $type,
            'config' => array(
                'autoUpload' => true,
                'request' => array(
                    //'endpoint' => Yii::app()->params->url_ImagePath, // OR $this->createUrl('files/upload'),
                    'endpoint' => Yii::app()->createAbsoluteUrl(lcfirst($controller) . '/upload', array('type' => $type)),
                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                ),
                'retry' => array('enableAuto' => true, 'preventRetryResponseProperty' => true),
                'chunking' => array('enable' => true, 'partSize' => 100), //bytes
                'callbacks' => array(
                    'onComplete' => "js:function(id, name, response){ "
					.$image_script.
					"$('#" . $controller . "_" . $filename . "').val( '" . $this->checkPath($type) . "'+'/'+response.filename);}",
                    
				'onError' => "js:function(id, name, errorReason){ console.log(errorReason); }",
                ),
                'validation' => array(
                    'allowedExtensions' => $this->checkAllowedExtensions($type),
                    'sizeLimit' => $sizeLimit, //maximum file size in bytes
                //'minSizeLimit' => 2 * 1024 * 1024, // minimum file size in bytes
                ),
            )
        ));
        if ($type == 'image') {

            echo '<div>Allowed Formats: jpg, jpeg, png, gif</div><div>Max File Size: 4MB</div>';
        } else if ($type == 'pdf') {

            echo '<div>Only the PDF format is allowed.</div><div>Max File Size: 10MB</div>';
        }

        //return value;
    }

    public function actionAjaxFileUpload($type) {

        $sizeLimit = $this->checkFileLimit($type); //maximum file size in bytes


        $tempFolder = Yii::getPathOfAlias('webroot') . '/upload/' . $type . '/';

        //mkdir($tempFolder, 0777, TRUE);
        //mkdir($tempFolder . 'chunks', 0777, TRUE);

        Yii::import("ext.EFineUploader.qqFileUploader");

        $uploader = new qqFileUploader();
        $uploader->allowedExtensions = $this->checkAllowedExtensions($type);
        $uploader->sizeLimit = $sizeLimit; //maximum file size in bytes
        $uploader->chunksFolder = $tempFolder . 'chunks';

        $result = $uploader->handleUpload($tempFolder);
        $result['filename'] = $uploader->getUploadName();
        //$result['folder'] = $webFolder;

        $uploadedFile = $tempFolder . $result['filename'];

        header("Content-Type: text/plain");
        $result = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $result;
        Yii::app()->end();
    }

    //改左core function i18n/data/en.php
    //https://github.com/yiisoft/yii/issues/2396
    public function timeStampComparison($startTimeStamp, $endTimeStamp) {

        //$now = date('d/m/Y', time());
        //$now = new DateTime();
        $now = strtotime("now");

        //$startTimeStamp = date('d/m/Y', strtotime($startTimeStamp));
        //$endTimeStamp = date('d/m/Y', strtotime($endTimeStamp));
        //$startTimeStamp = new DateTime(Yii::app()->getDateFormatter()->format('y-m-d', $startTimeStamp));
        //$endTimeStamp = new DateTime(Yii::app()->getDateFormatter()->format('y-m-d', $endTimeStamp));

        /*
          CVarDumper::dump($startTimeStamp . '<br/>');
          CVarDumper::dump($endTimeStamp . '<br/>');
          CVarDumper::dump($now . '<br/>');
          CVarDumper::dump($now >= $startTimeStamp . '<br/>');
          CVarDumper::dump($now <= $endTimeStamp . '<br/>');
         */

        //return true;
        //if ($now->getTimestamp() <= $endTimeStamp->getTimestamp() && $now->getTimestamp() >= $startTimeStamp->getTimestamp()) {
        if ($now <= $endTimeStamp && $now >= $startTimeStamp) {

            //$array2[] = $timestamp;
            return true;
        } else {
            return false;
        }


        //
        //$startTimeStamp = date('d/m/Y', $startTimeStamp);
        //$endTimeStamp = date('d/m/Y', $endTimeStamp);
        //$now = strtotime("now  GMT +0800");
        //$now = time();
        //$date1 = strtotime('Thursday February 17, 2011');
        //$date2 = strtotime('Thursday March 3, 2011');
        /*
          foreach ($array1 as $timestamp) {
          if ($timestamp <= $date2 && $timestamp >= $date1)
          $array2[] = $timestamp;
          }
         */
        //CVarDumper::dump(date('m/d/Y h:i:s a', time()), 10, true);
        //CVarDumper::dump(date('d/m/Y', time()), 10, true);
        //CVarDumper::dump(Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['long'], $startTimeStamp), 10, true);
        //CVarDumper::dump($startTimeStamp, 10, true);
        //CVarDumper::dump(Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['long'], $endTimeStamp), 10, true);
        //CVarDumper::dump($endTimeStamp, 10, true);
        //CVarDumper::dump($now, 10, true);
        //CVarDumper::dump($now, 10, true);
        //CVarDumper::dump($startTimeStamp, 10, true);
        //CVarDumper::dump($endTimeStamp, 10, true);

        /*
          CVarDumper::dump($now >= $startTimeStamp, 10, true);
          CVarDumper::dump($now <= $endTimeStamp, 10, true);
         */
        //echo '<br/>';
    }

    protected function echoBooking_menu_link($tail) {
        echo Yii::app()->getBaseUrl(true) . "/../../" . $tail;
    }

    protected function echoTinyMCE($model, $attribute) {
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => $attribute,
            // Optional config
            'compressorRoute' => 'tinyMce/compressor',
            //'spellcheckerUrl' => array('tinyMce/spellchecker'),
            // or use yandex spell: http://api.yandex.ru/speller/doc/dg/tasks/how-to-spellcheck-tinymce.xml
            //'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
            'fileManager' => array(
                'class' => 'ext.elFinder.TinyMceElFinder',
                'connectorRoute' => 'admin/elfinder/connector',
            ),
            'htmlOptions' => array(
                'rows' => 6,
                'cols' => 60,
            ),
            'settings' => array(
                'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link forecolor backcolor",
                'menubar' => false
            ),
        ));
    }

    protected function checkAllowedExtensions($type) {

        if ($type == 'pdf') {
            return array('pdf');
        } else if ($type == 'image') {
            return array('jpg', 'jpeg', 'png', 'gif');
        }
    }

    protected function checkFileLimit($type) {

        if ($type == 'pdf') {
            return 10 * 1024 * 1024;
        } else if ($type == 'image') {
            return 4 * 1024 * 1024;
        }
    }

    protected function checkPath($type) {

        //CVarDumper::dump(Yii::app()->params->upload_ImagePath, 10, true);
        if ($type == 'pdf') {
            return Yii::app()->params->url_PDFPath;
        } else if ($type == 'image') {
            return Yii::app()->params->url_ImagePath;
        }
    }

    protected function echoTimerScript($twentyTimeStamp = null) {

        if ($twentyTimeStamp) {

            $cookie_booking = Yii::app()->Cookies->getCMsg('booking');
            echo "<script>$(document).ready(function () {royalObject.counter(" . $twentyTimeStamp . ", " . time() . ", '" . Yii::app()->createAbsoluteUrl('booking/stepone', array("id" => $cookie_booking[0])) . "');});</script>";
            //Yii::app()->clientScript->registerScript('myscript', "royalObject.counter(".$twentyTimeStamp.", ". time() .");",CClientScript::POS_LOAD     );
        }
    }

}
