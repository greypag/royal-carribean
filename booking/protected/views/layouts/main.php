<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo">

                    <?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . '/images/icons/logo.png" />', Yii::app()->request->baseUrl); ?><br/>
                    <?php echo CHtml::encode(Yii::app()->name); ?>
                </div>
            </div><!-- header -->

            <div id="mainmenu">
                <?php
                //'label'=>Yii::t('Login'),  可以試下用尼個!!!
                $this->widget('zii.widgets.CMenu', array(
                    'activeCssClass' => 'active',
                    'activateParents' => true,
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Bookings & Inventories',
                            'items' => array(
                                array('label' => 'Bookings', 'url' => array('/booking/admin')),
                                array('label' => 'Guests', 'url' => array('/guest/admin')),
                                array('label' => 'Stateroom Inventories', 'url' => array('/roomInventory/admin')),
                            ), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Itineraries',
                            'items' => array(
                                array('label' => 'Manage Itineraries', 'url' => array('/itinerary/admin')),
                                //array('label' => 'Itinerary Room Price', 'url' => array('/itineraryRoomType/index')),
                                array('label' => 'Promotional Codes', 'url' => array('/promotionCode/admin')),
                            //array('label' => 'Room type Promotion Code', 'url' => array('/roomtypePromotioncode/index')),
                            ), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Cruises',
                            'items' => array(
                                array('label' => 'Manage Cruises', 'url' => array('/cruise/admin')),
                                array('label' => 'Stateroom Categories', 'url' => array('/roomType/index')),
                            ), 'visible' => !Yii::app()->user->isGuest),
                        /*
                          array('label' => 'Download Excel',
                          'items' => array(
                          array('label' => 'Booking', 'url' => array('/booking/DownloadExcel')),
                          //array('label' => 'Stateroom Cats.', 'url' => array('/roomType/index')),
                          ), 'visible' => !Yii::app()->user->isGuest),
                         */
                        array('label' => 'Reservation code', 'url' => array('/reservationCode/admin'), 'visible' => !Yii::app()->user->isGuest),
                        //array('label' => 'Import CSV', 'url' => array('/importcsv'), 'visible' => !Yii::app()->user->isGuest),
                        //array('label' => 'About', 'url' => array('/site/page', 'view' => 'about'), 'visible' => !Yii::app()->user->isGuest),
                        //array('label' => 'Contact', 'url' => array('/site/contact'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'homeLink' => false // add this line
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by fevaworks.<br/>
                All Rights Reserved.<br/>
                <?php //echo Yii::powered();  ?>
            </div><!-- footer -->

        </div><!-- page -->

        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-ui.min.js"></script>-->
    </body>
</html>
