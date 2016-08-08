<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('guest_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->guest_id), array('view', 'id' => $data->guest_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('irt_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->irt)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('booking_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->booking)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('promotion_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->promotion)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title')); ?>:
	<?php echo GxHtml::encode($data->title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('first_name')); ?>:
	<?php echo GxHtml::encode($data->first_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('middle_name')); ?>:
	<?php echo GxHtml::encode($data->middle_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_name')); ?>:
	<?php echo GxHtml::encode($data->last_name); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('gender')); ?>:
	<?php echo GxHtml::encode($data->gender); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('document_type')); ?>:
	<?php echo GxHtml::encode($data->document_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('document_number')); ?>:
	<?php echo GxHtml::encode($data->document_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:
	<?php echo GxHtml::encode($data->date_of_birth); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_no')); ?>:
	<?php echo GxHtml::encode($data->phone_no); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('citizenship')); ?>:
	<?php echo GxHtml::encode($data->citizenship); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cruise_fare')); ?>:
	<?php echo GxHtml::encode($data->cruise_fare); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('subtotal')); ?>:
	<?php echo GxHtml::encode($data->subtotal); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tax_fees_port')); ?>:
	<?php echo GxHtml::encode($data->tax_fees_port); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('discount')); ?>:
	<?php echo GxHtml::encode($data->discount); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('assigned_room_id')); ?>:
	<?php echo GxHtml::encode($data->assigned_room_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rc_global_guest_id')); ?>:
	<?php echo GxHtml::encode($data->rc_global_guest_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('internal_notes')); ?>:
	<?php echo GxHtml::encode($data->internal_notes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('allow_personalData')); ?>:
	<?php echo GxHtml::encode($data->allow_personalData); ?>
	<br />
	*/ ?>

</div>