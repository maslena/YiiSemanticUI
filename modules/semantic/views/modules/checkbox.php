<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
	Yii::app()->controller->id,
	Yii::app()->controller->action->id,
);

Yii::app()->clientScript->registerScript('semantic-ui-checkbox', '
// attach ready event
$(document).ready(function(){
	$(\'.ui.checkbox\').checkbox();
});');
?>
<h1 class="ui dividing header">Types</h1>
<div class="main">
	<!--checkbox-->
	<div class="ui header">Checkbox</div>
	<?php echo SUIHtml::checkBox('fun', false, array('label'=>'Make my profile visible')); ?>
	<div class="ui divider"></div>

	<!--slider-->
	<div class="ui header">Slider</div>
	<?php echo SUIHtml::checkBox('newsletter', false, array('label'=>'Accept terms and conditions', 'checkboxOptions'=>array('class'=>'slider'))); ?>
	<div class="ui divider"></div>

	<!--toggle-->
	<div class="ui header">Toggle</div>
	<?php echo SUIHtml::checkBox('public', false, array('label'=>'Subscribe to weekly newsletter', 'checkboxOptions'=>array('class'=>'toggle'))); ?>
	<div class="ui divider"></div>

	<!--radio box-->
	<div class="ui header">Radio Box</div>
	<div class="ui form">
		<div class="grouped inline fields">
			<?php echo SUIHtml::radioButton('fruit', true, array('label'=>'Once a week')); ?>
			<?php echo SUIHtml::radioButton('fruit', false, array('label'=>'2-3 times a week')); ?>
			<?php echo SUIHtml::radioButton('fruit', false, array('label'=>'Once a day')); ?>
			<?php echo SUIHtml::radioButton('fruit', false, array('label'=>'Twice a day')); ?>
		</div>
	</div>

	<h1 class="ui dividing header">States</h1>
	<!--read only-->
	<div class="ui header">Read-only</div>
	<?php echo SUIHtml::checkBox('readonly', false, array('label'=>'Read Only', 'checkboxOptions'=>array('class'=>'read-only'))); ?>
	<div class="ui divider"></div>

	<!--disabled-->
	<div class="ui header">Disabled</div>
	<?php echo SUIHtml::checkBox('disabled', false, array('label'=>'Disabled', 'checkboxOptions'=>array('class'=>'disabled'))); ?>
	<br/>
	<?php echo SUIHtml::checkBox('disabled', false, array('label'=>'Disabled', 'checkboxOptions'=>array('class'=>'toggle disabled'))); ?>
	<div class="ui divider"></div>

	<h1 class="ui dividing header">Variations</h1>
	<!--fitted-->
	<div class="ui header">Fitted</div>
	<div class="ui left floated segment">
		<?php echo SUIHtml::checkBox('fitted', false, array('checkboxOptions'=>array('class'=>'fitted'))); ?>
	</div>
	<div class="ui left floated segment">
		<?php echo SUIHtml::checkBox('fittedSlider', false, array('checkboxOptions'=>array('class'=>'fitted slider'))); ?>
	</div>
	<div class="ui left floated segment">
		<?php echo SUIHtml::checkBox('fittedToggle', false, array('checkboxOptions'=>array('class'=>'fitted toggle'))); ?>
	</div>
	<div style="clear:both;">
	<div class="ui divider"></div>
	<!--checkbox list-->
	<div class="ui form">
		<div class="ui header">Checkbox list</div>
		<?php echo SUIHtml::checkBoxList('optionOne', 1, array(
			0=>'Option one',
			1=>'Option two',
			2=>'Option three'
		), array(
			'container'=>'div'
		)); ?>
		<?php echo SUIHtml::checkBoxList('optionOne', 1, array(
			0=>'Option one',
			1=>'Option two',
			2=>'Option three'
		), array(
			'container'=>'div',
			'inline'=>'inline'
		)); ?>
	</div>

	<h1 class="ui dividing header">Active Checkbox</h1>
	<div class="ui form">
		<?php echo SUIHtml::activeCheckBox($model, 'toc', array()); ?>
	</div>
	<br/>
	<div class="ui form">
		<div class="ui header">Active Checkbox list</div>
		<?php echo SUIHtml::activeCheckBoxList($model, 'privacy', array(
			0=>'Option one',
			1=>'Option two'
		), array(
			'container'=>'div',
			'inline'=>'inline'
		)); ?>
		<?php echo SUIHtml::activeCheckBoxList($model, 'newsletter', array(
			0=>'Option one',
			1=>'Option two'
		), array(
			'container'=>'div'
		)); ?>
	</div>

	<h1 class="ui dividing header">Active Form Checkbox</h1>
	<?php $form=$this->beginWidget('sui.widgets.SUIActiveForm',array(
		'id'=>'checkbox-form',
		//'fluid'=>true,
		//'size'=>'large',
		//'inverted'=>true,
		'segment'=>true,
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="grouped fields">
	<?php echo $form->checkboxListField($model, 'newsletter', array('widgetOptions'=>array('data'=>array(
		0=>'Top Post This Week',
		1=>'Hot Deals'
	)))); ?>
	</div>
	<div class="inline fields">
	<?php echo $form->checkboxField($model, 'toc', array()); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>