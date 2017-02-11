<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('promotion_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->promotion_id), array('view', 'id' => $data->promotion_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('promotion_name')); ?>:
	<?php echo GxHtml::encode($data->promotion_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('promotion_name_tc')); ?>:
	<?php echo GxHtml::encode($data->promotion_name_tc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('promotion_code')); ?>:
	<?php echo GxHtml::encode($data->promotion_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('start_date')); ?>:
	<?php echo GxHtml::encode($data->start_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('end_date')); ?>:
	<?php echo GxHtml::encode($data->end_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('figure_per_guest')); ?>:
	<?php echo GxHtml::encode($data->figure_per_guest); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('quota')); ?>:
	<?php echo GxHtml::encode($data->quota); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('accumulate_quota')); ?>:
	<?php echo GxHtml::encode($data->accumulate_quota); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('internal_notes')); ?>:
	<?php echo GxHtml::encode($data->internal_notes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('non_pricing_notes')); ?>:
	<?php echo GxHtml::encode($data->non_pricing_notes); ?>
	<br />
	*/ ?>

</div>