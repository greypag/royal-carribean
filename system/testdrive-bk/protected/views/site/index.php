<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Welcome back, <?php echo Yii::app()->user->getId(); ?>!</p>


<p></p>
<!--
<div class="search-form">
<?php
//no use now 20-7-2015
/*
  $this->renderPartial('//booking/booking_report', array(
  'model' => Guest::model(),
  ));
 */
?>
</div> search-form -->
