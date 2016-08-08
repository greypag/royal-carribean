<div class="view">

    
    <b><?php echo GxHtml::encode($data->getAttributeLabel('rt_id')); ?>:</b>
    <?php echo GxHtml::link(GxHtml::encode($data->rt_id), array('view', 'id' => $data->sys_rt_id)); ?>
    <br />
    

    <b><?php echo GxHtml::encode($data->getAttributeLabel('cruise_id')); ?>:</b>
    <?php echo GxHtml::encode(GxHtml::valueEx($data->cruise)); ?>
    <br />
    <b><?php echo GxHtml::encode($data->getAttributeLabel('rt_name')); ?>:</b>
    <?php echo GxHtml::encode($data->rt_name); ?>
    <br />
    <b><?php echo GxHtml::encode($data->getAttributeLabel('rt_des')); ?>:</b>
    <?php echo $data->rt_des; ?>
    <br />
    <b><?php echo GxHtml::encode($data->getAttributeLabel('rt_capacity')); ?>:</b>
    <?php echo GxHtml::encode($data->rt_capacity); ?>
    <br />
    <b><?php echo GxHtml::encode($data->getAttributeLabel('room_image')); ?>:</b>
    <br/>
    <?php
    if (!(is_null($data->room_image)) && !(trim($data->room_image) === '')) {
        /*
        echo CHtml::image(Yii::app()->getBaseUrl(true) . '/' . $data->room_image, "image", array(
            'style' => 'height: 200px',
        ));
         */
        echo CHtml::image($data->room_image, "image", array(
            'style' => 'height: 200px',
        ));
    }
    ?> 
    <br />
    <?php /*
      <?php echo GxHtml::encode($data->getAttributeLabel('language')); ?>:
      <?php echo GxHtml::encode($data->language); ?>
      <br />
     */ ?>

</div>