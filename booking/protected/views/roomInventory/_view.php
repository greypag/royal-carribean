<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('room_inventory_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->room_inventory_id), array('view', 'id' => $data->room_inventory_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('itinerary_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->itinerary)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rt_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->rt)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('room_no')); ?>:
	<?php echo GxHtml::encode($data->room_no); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('booking_ip')); ?>:
	<?php echo GxHtml::encode($data->booking_ip); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('reservation_code')); ?>:
	<?php echo GxHtml::encode($data->reservation_code); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('notes')); ?>:
	<?php echo GxHtml::encode($data->notes); ?>
	<br />
	*/ ?>

</div>