<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('promotion_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->promotion)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rt_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->rt)); ?>
	<br />

</div>