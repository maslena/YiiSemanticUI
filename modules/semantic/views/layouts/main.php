<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="en">
		<?php //Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body>
		<?php $this->widget('sui.widgets.SUINavBar', array(
			'id' => 'navbar',
			'brand' => Yii::app()->name,
			//'fixed' => true,
			//'placement' => 'bottom',
			//'inverted' => false,
			//'devices' => array('tablet'),
			'htmlOptions' => array(
				'class' => 'blue large',
			),
			'items' => array(
				'<a class="item" href="">Home</a>',
				'<a class="item" href="">About Us</a>',
				'<a class="ui dropdown navbar item">Dropdown
                  <i class="dropdown icon"></i>
                  <div class="menu">
                    <div class="item">Action</div>
                    <div class="item">Another action</div>
                    <div class="item">Something else here</div>
                    <div class="ui divider"></div>
                    <div class="item">Seperated link</div>
                    <div class="item">One more seperated link</div>
                  </div>
                </a>',
			)
		)); ?>
		<div class="ui page grid main">
			<div class="sixteen wide column">

				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
				<?php endif?>

				<?php echo $content; ?>

				<div class="clear"></div>

				<div id="footer">
					
				</div><!-- footer -->
			</div>
		</div><!-- page -->

	</body>
</html>
