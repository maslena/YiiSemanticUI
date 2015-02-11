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

				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>

				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>

				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
				<?php endif?>

				<?php echo $content; ?>

				<div class="clear"></div>

				<div id="footer">
					Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
					All Rights Reserved.<br/>
					<?php echo Yii::powered(); ?>
				</div><!-- footer -->
			</div>
		</div><!-- page -->

	</body>
</html>
