<?php
/* @var $this DefaultController */

/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
	Yii::app()->controller->id,
	Yii::app()->controller->action->id,
);
?>
<h1 class="ui dividing header">Type</h1>
<div class="main">
	<div class="ui header">Form</div>
	<?php $form=$this->beginWidget('sui.widgets.SUIActiveForm',array(
		'id'=>'personal-info-form',
		//'fluid'=>true,
		//'size'=>'large',
		//'inverted'=>true,
		'segment'=>true,
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="grouped fields">
	<?php echo $form->textInputField($model, 'name', array()); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>