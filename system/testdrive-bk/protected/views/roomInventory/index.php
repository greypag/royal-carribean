<?php
$this->breadcrumbs = array(
    RoomInventory::label(2),
    Yii::t('app', 'admin'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . RoomInventory::label(), 'url' => array('create')),
    //array('label' => 'Available Itinerary' . ' ' . RoomInventory::label(2), 'url' => array('admin')),
    array('label' => 'Room Inven.', 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(RoomInventory::label(2)); ?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
