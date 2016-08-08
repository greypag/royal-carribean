<div class="view">


    <?php echo GxHtml::encode($data->getAttributeLabel('cruise_id')); ?>:
    <?php
    //echo CHtml::link(CHtml::encode($data->cruise_id), array('view', 'cruise_id' => $data->cruise_id));
    echo CHtml::link(CHtml::encode($data->cruise_id), array('view', 'id' => $data->cruise_id));
    ?>
    <br />
    <?php echo GxHtml::encode($data->getAttributeLabel('cruise_name')); ?>:
    <?php echo GxHtml::encode($data->cruise_name); ?>
    <br />

</div>