<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('booking_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->booking_id), array('view', 'id' => $data->booking_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('booking_time')); ?>:
	<?php echo GxHtml::encode($data->booking_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ip')); ?>:
	<?php echo GxHtml::encode($data->ip); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('no_of_guest')); ?>:
	<?php echo GxHtml::encode($data->no_of_guest); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total_payment')); ?>:
	<?php echo GxHtml::encode($data->total_payment); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('booking_status')); ?>:
	<?php echo GxHtml::encode($data->booking_status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('internal_notes')); ?>:
	<?php echo GxHtml::encode($data->internal_notes); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('promotion_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->promotionCode)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('itinerary_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->itinerary)); ?>
	<br />
	*/ ?>

</div>