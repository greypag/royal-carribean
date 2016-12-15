<?php

$this->breadcrumbs = array(
	//RoomType::label(2),
    'Cruises',
	Yii::t('app', 'Stateroom Categories'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . RoomType::label(2), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . RoomType::label(2), 'url' => array('admin')),
);
?>

<h1>
    <?php //echo GxHtml::encode(RoomType::label(2)); ?>
    Stateroom Categories
</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 