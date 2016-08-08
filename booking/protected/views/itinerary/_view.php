<?php
/* @var $this ItineraryController */
/* @var $data Itinerary */
?>

<div class="view">


    <b><?php echo CHtml::encode($data->getAttributeLabel('itinerary_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->itinerary_id), array('view', 'id' => $data->itinerary_id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('itinerary_name')); ?>:</b>
    <?php echo CHtml::encode($data->itinerary_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('cruise_id')); ?>:</b>
    <?php echo CHtml::encode($data->cruise_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('days_nights_full_desc')); ?>:</b>
    <?php echo CHtml::encode($data->days_nights_full_desc); ?>
    <br />

    <!--
    <b><?php //echo CHtml::encode($data->getAttributeLabel('days_nights_short_desc'));  ?>:</b>
    <?php //echo CHtml::encode($data->days_nights_short_desc); ?>
    <br />
    -->

    <b><?php echo CHtml::encode($data->getAttributeLabel('pdf')); ?>:</b>
    <?php
    if (!(is_null($data->pdf)) && !(trim($data->pdf) === '')) {
        echo CHtml::link('Download file', $data->pdf, array('target' => '_blank'));
    }
    ?>

    <br />

    <b>
        <?php echo CHtml::encode($data->getAttributeLabel('image'));
        ?>:</b>
    <br/>
    <?php
    if (!(is_null($data->image)) && !(trim($data->image) === '')) {
        echo CHtml::image($data->image, "image", array(
            'style' => 'height: 120px',
        ));
    }
    ?> 
    <br/>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('port_of_boarding')); ?>:</b>
    <?php echo CHtml::encode($data->port_of_boarding); ?>
    <br />

    <b>
        Port of Departure<?php //echo CHtml::encode($data->getAttributeLabel('port_of_departure'));  ?>:
    </b>
    <?php echo CHtml::encode($data->port_of_departure); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('ports_of_calls')); ?>:</b>
    <?php //echo CHtml::encode($data->ports_of_calls); ?>
    <?php echo $data->ports_of_calls; ?>
    <br />


    <b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
    <?php echo CHtml::encode($data->start_date); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
    <?php echo CHtml::encode($data->end_date); ?>
    <br />
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('minimum_cruise_fares')); ?>:</b>
    $<?php echo CHtml::encode($data->minimum_cruise_fares); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('taxes_fee')); ?>:</b>
    $<?php echo CHtml::encode($data->taxes_fee); ?>
    <br />





    <b><?php echo CHtml::encode($data->getAttributeLabel('prepaid_gratuties')); ?>:</b>
    $<?php echo CHtml::encode($data->prepaid_gratuties); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('ncff')); ?>:</b>
    $<?php echo CHtml::encode($data->ncff); ?>
    <br />

    <br />
    <br />

    <b>Stateroom Price:</b>
    <?php
    $model = ItineraryRoomType::model();
    $criteria = new CDbCriteria;
    $criteria->compare('itinerary_id', $data->itinerary_id);
    $criteria->compare('cruise_id', $data->cruise_id);


    $dataProvider = new CActiveDataProvider(get_class($model), array('criteria' => $criteria));

    //CVarDumper::dump($dataProvider, 10, true);
    //$itineraryRoomTypesModel = new ItineraryRoomType('search');
    //$itineraryRoomTypesModel->unsetAttributes();
    // $itineraryRoomTypesModel->setAttributes($itineraryRoomTypes);


    $this->widget('zii.widgets.grid.CGridView', array(
        //'id' => 'itinerary-grid',
        //'dataProvider' => $itineraryRoomTypesModel->search(),
        'dataProvider' => $dataProvider,
        'htmlOptions' => array('style' => 'padding: 0px;'),
        //'filter' => $itineraryRoomTypesModel,
        'columns' => array(
            'rt_id' => array(
                'name' => 'rt_id',
                'header' => 'Stateroom ID',
            ),
            'cruise_id',
            'fare_guest1_2',
            'fare_guest3_4',
            /*
            'start_date' => array(
                'name' => 'start_date',
                //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                //'value' => 'Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long"], $data->start_date)',
                'value' => '$data->start_date',
            ),
            'end_date' => array(
                'name' => 'end_date',
                //'value'=>'date("d M Y",strtotime($data["work_date"]))'
                //'value' => 'Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long"], $data->end_date)',
                'value' => '$data->end_date',
            ),
            */
            array(
                'class' => 'CButtonColumn',
                'header' => 'Action',
                'template' => '{view}{update}{delete}',
                'buttons' => array
                    (
                    'view' => array
                        (
                        //'label' => 'Send an e-mail to this user',
                        //'imageUrl' => Yii::app()->request->baseUrl . '/images/email.png',
                        'url' => 'Yii::app()->createUrl("itineraryRoomType/id/".$data->irt_id)',
                    //'url' => 'Yii::app()->createUrl("itineraryRoomType/update", array("id"=>$data->irt_id))',
                    ),
                    'update' => array
                        (
                        'url' => 'Yii::app()->createUrl("itineraryRoomType/update/id/".$data->irt_id)',
                    //'visible' => '$data->irt_id > 0',
                    //'click' => 'function(){alert("Going down!");}',
                    ),
                    'delete' => array
                        (
                        'url' => 'Yii::app()->createUrl("itineraryRoomType/delete/id/".$data->irt_id)',
                    //'visible' => '$data->irt_id > 0',
                    //'click' => 'function(){alert("Going down!");}',
                    ),
                ),
            ),
        ),
    ));
    ?>


</div>