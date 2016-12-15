<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('irt_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->irt_id), array('view', 'id' => $data->irt_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('itinerary_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->itinerary)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rt_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->rt)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cruise_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->cruise)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fare_guest1_2')); ?>:
	<?php echo GxHtml::encode($data->fare_guest1_2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fare_guest3_4')); ?>:
	<?php echo GxHtml::encode($data->fare_guest3_4); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('start_date')); ?>:
	<?php echo GxHtml::encode($data->start_date); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('end_date')); ?>:
	<?php echo GxHtml::encode($data->end_date); ?>
	<br />
	*/ ?>

</div>