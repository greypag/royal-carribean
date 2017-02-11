<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs = array(
    'Itineraries' => array('admin'),
    $model->itinerary_name,
);

$this->menu = array(
    array('label' => 'List of Itinerary', 'url' => array('index')),
    array('label' => 'Create Itinerary', 'url' => array('create')),
    array('label' => 'Update Itinerary', 'url' => array('update', 'id' => $model->itinerary_id)),
    array('label' => 'Delete Itinerary', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->itinerary_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Itinerary', 'url' => array('admin')),
);
?>

<h1>View Itinerary #<?php echo $model->itinerary_id; ?>&nbsp;<?php echo $model->itinerary_name; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'itinerary_id',
        'itinerary_name',
        'days_nights_full_desc',
        //'days_nights_short_desc',
        'minimum_cruise_fares',
        'pdf',
        'image',
        //'language',
    ),
));
?>
