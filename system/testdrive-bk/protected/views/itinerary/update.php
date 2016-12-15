<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs = array(
    'Itineraries' => array('admin'),
    $model->itinerary_name => array('view', 'id' => $model->itinerary_id),
    'Update',
);

$this->menu = array(
    array('label' => 'List of Itinerary', 'url' => array('index')),
    array('label' => 'Create Itinerary', 'url' => array('create')),
    array('label' => 'View Itinerary', 'url' => array('view', 'id' => $model->itinerary_id)),
    array('label' => 'Manage Itinerary', 'url' => array('admin')),
);
?>

<h1>Update Itinerary <?php echo $model->itinerary_id; ?></h1>


<?php
    $this->renderPartial('_form', 
            array(
                'model' => $model, 
                'bookingRecord' => (!empty($bookingRecord)) ? $bookingRecord : 0
            )
    );
?>