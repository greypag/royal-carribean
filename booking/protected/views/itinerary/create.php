<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs=array(
	'Itineraries'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List of Itineraries', 'url'=>array('index')),
	array('label'=>'Manage an Itinerary', 'url'=>array('admin')),
);
?>

<h1>Create an Itinerary</h1>

<?php 
$this->renderPartial('_form', array('model'=>$model)); ?>