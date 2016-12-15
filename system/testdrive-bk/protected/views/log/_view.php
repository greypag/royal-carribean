<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('create_date')); ?>:
	<?php echo GxHtml::encode($data->create_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('category')); ?>:
	<?php echo GxHtml::encode($data->category); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />

</div>