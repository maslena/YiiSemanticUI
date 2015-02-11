<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
	Yii::app()->controller->id,
	Yii::app()->controller->action->id,
);
?>
<h1>Breadcrumb</h1>
<div class="ui breadcrumb">
  <a class="section">Home</a>
  <div class="divider"> / </div>
  <a class="section">Store</a>
  <div class="divider"> / </div>
  <div class="active section">T-Shirt</div>
</div>