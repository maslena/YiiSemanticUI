<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
	Yii::app()->controller->id,
	Yii::app()->controller->action->id,
);

Yii::app()->clientScript->registerScript('semantic-ui-button', '
$(document).ready(function(){
	var buttons         = $(\'.main .ui.buttons .button\'),
		invertedButtons = $(\'.main .inverted.button\'),
		toggle          = $(\'.main .ui.toggle.button\'),
		follow          = $(\'.main button[name="yt0"].button\'),
		button          = $(\'.ui.button\').not(buttons).not(toggle),

		// alias
		handler = {
			activate: function(){
				$(this).addClass(\'active\').siblings().removeClass(\'active\');
			}
		};
	invertedButtons.state();

	buttons.on(\'click\', handler.activate);

	follow.state({
		text:{
			inactive : \'Follow\',
			active   : \'Following\'
		}
	});

	toggle.state({
		text: {
			inactive : \'Vote\',
			active   : \'Voted\'
		}
	});
});');
?>
<h1 class="ui dividing header">Types</h1>
<p>
Hery put your button example here. Reference http://semantic-ui.com/elements/button.html
</p>
<div class="main">
	<div class="ui header">Botton</div>
	<!-- standart -->
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'label'=>'Follow',
	)); ?>
	<div class="ui divider"></div>

	<!-- ordinality -->
	<div class="ui header">Ordinality</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'primary',
		'label'=>'Save',
	)); ?>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'label'=>'Discard',
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'secondary',
		'label'=>'Okay',
	)); ?>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'label'=>'Cancel',
	)); ?>
	<div class="ui divider"></div>

	<!-- animated -->
	<div class="ui header">Animated</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'animated'=>array(
			'visibleContent'=>array(
				'label'=>'Next'
			),
			'hiddenContent'=>array(
				'icon'=>'right arrow'
			)
		),
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'animated'=>array(
			'type'=>'vertical',
			'visibleContent'=>array(
				'icon'=>'shop'
			),
			'hiddenContent'=>array(
				'label'=>'Shop'
			)
		),
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'animated'=>array(
			'type'=>'fade',
			'visibleContent'=>array(
				'label'=>'Sign-up for a Pro account'
			),
			'hiddenContent'=>array(
				'label'=>'$12.99 a month'
			)
		),
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'animated'=>array(
			'visibleContent'=>array(
				'icon'=>'left arrow',
				'label'=>'Left'
			),
			'hiddenContent'=>array(
				'icon'=>'right arrow',
				'label'=>'Right'
			)
		),
	)); ?>
	<div class="ui divider"></div>

	<!-- icon -->
	<div class="ui header">Icon</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'icon'=>'cloud',
	)); ?>
	<div class="ui divider"></div>

	<!--labeled-->
	<div class="ui header">Labeled</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'labeled'=>'left',
		'icon'=>'pause',
		'label'=>'Pause'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'labeled'=>'right',
		'icon'=>'right arrow',
		'label'=>'Next'
	)); ?>

	<div class="ui divider"></div>

	<!--basic-->
	<div class="ui header">Basic</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'icon'=>'user',
		'label'=>'Add Friend'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'black',
		'label'=>'Black'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'yellow',
		'label'=>'Yellow'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'green',
		'label'=>'Green'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'blue',
		'label'=>'Blue'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'orange',
		'label'=>'Orange'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'purple',
		'label'=>'Purple'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'pink',
		'label'=>'Pink'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'red',
		'label'=>'Red'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'color'=>'teal',
		'label'=>'Teal'
	)); ?>

	<div class="ui divider"></div>

	<!--inverted-->
	<div class="ui header">Inverted</div>
	<div class="ui inverted segment">
		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'label'=>'Standard'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'black',
			'label'=>'Black'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'yellow',
			'label'=>'Yellow'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'green',
			'label'=>'Green'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'blue',
			'label'=>'Blue'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'orange',
			'label'=>'Orange'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'purple',
			'label'=>'Purple'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'pink',
			'label'=>'Pink'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'red',
			'label'=>'Red'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'color'=>'teal',
			'label'=>'Teal'
		)); ?>
	</div>
	<div class="ui inverted segment">
		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'label'=>'Basic'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'black',
			'label'=>'Basic Black'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'yellow',
			'label'=>'Basic Yellow'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'green',
			'label'=>'Basic Green'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'blue',
			'label'=>'Basic Blue'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'orange',
			'label'=>'Basic Orange'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'purple',
			'label'=>'Basic Purple'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'pink',
			'label'=>'Basic Pink'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'red',
			'label'=>'Basic Red'
		)); ?>

		<?php $this->widget('sui.widgets.SUIButton', array(
			'type'=>'submit',
			'inverted'=>true,
			'context'=>'basic',
			'color'=>'teal',
			'label'=>'Basic Teal'
		)); ?>
	</div>

	<h1 class="ui dividing header">Group</h1>
	<!--group buttons-->
	<div class="ui header">Buttons</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'label'=>'One'),
			array('type'=>'submit', 'label'=>'Two'),
			array('type'=>'submit', 'label'=>'Three')
		),
	)); ?>
	<div class="ui divider"></div>
	
	<!--group icons-->
	<div class="ui header">Icons</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'icon'=>'align left'),
			array('type'=>'submit', 'icon'=>'align center'),
			array('type'=>'submit', 'icon'=>'align right'),
			array('type'=>'submit', 'icon'=>'align justify')
		),
	)); ?>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'icon'=>'bold'),
			array('type'=>'submit', 'icon'=>'underline'),
			array('type'=>'submit', 'icon'=>'text width')
		),
	)); ?>
	<div class="ui divider"></div>

	<!--group buttons with conditional-->
	<div class="ui header">Conditional</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'label'=>'Cancel'),
			array('type'=>'submit', 'context'=>'positive', 'label'=>'Save'),
		),
		'conditional' => array('dataText'=>'or')
	)); ?>

	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'label'=>'un'),
			array('type'=>'submit', 'context'=>'positive', 'label'=>'deux'),
		),
		'conditional' => array('dataText'=>'ou')
	)); ?>

	<div class="ui divider"></div>

	<h1 class="ui dividing header">State</h1>
	<!--hover-->
	<div class="ui header">Hover</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'label'=>'Follow',
	)); ?>
	<div class="ui divider"></div>

	<!--down-->
	<div class="ui header">Down</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'icon'=>'user',
		'label'=>'Follow',
	)); ?>

	<div class="ui divider"></div>

	<!--active-->
	<div class="ui header">Active</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'icon'=>'user',
		'active'=>true,
		'label'=>'Follow',
	)); ?>
	<div class="ui divider"></div>

	<!--disabled-->
	<div class="ui header">Disabled</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'icon'=>'user',
		'disabled'=>true,
		'label'=>'Follow',
	)); ?>
	<div class="ui divider"></div>

	<!--loading-->
	<div class="ui header">Loading</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'loading'=>true,
		'label'=>'Loading',
	)); ?>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'basic',
		'loading'=>true,
		'label'=>'Loading',
	)); ?>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'primary',
		'loading'=>true,
		'label'=>'Loading',
	)); ?>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'secondary',
		'loading'=>true,
		'label'=>'Loading',
	)); ?>
	<div class="ui divider"></div>

	<h1 class="ui dividing header">Variations</h1>
	<!--social-->
	<div class="ui header">Social</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'social'=>'facebook',
		'icon'=>'facebook',
		'label'=>'Facebook'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'social'=>'twitter',
		'icon'=>'twitter',
		'label'=>'Twitter'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'social'=>'google plus',
		'icon'=>'google plus',
		'label'=>'Google Plus'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'social'=>'vk',
		'icon'=>'vk',
		'label'=>'VK'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'social'=>'linkedin',
		'icon'=>'linkedin',
		'label'=>'LinkedIn'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'social'=>'instagram',
		'icon'=>'instagram',
		'label'=>'Instagram'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'social'=>'youtube',
		'icon'=>'youtube',
		'label'=>'Youtube'
	)); ?>
	<div class="ui divider"></div>

	<!--sizes-->
	<div class="ui header">Sizes</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'mini',
		'label'=>'Mini'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'tiny',
		'label'=>'Tiny'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'small',
		'label'=>'Small'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'medium',
		'label'=>'Medium'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'large',
		'label'=>'Large'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'big',
		'label'=>'Big'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'huge',
		'label'=>'Huge'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'size'=>'massive',
		'label'=>'Massive'
	)); ?>
	<div class="ui divider"></div>

	<!--colors-->
	<div class="ui header">Colors</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'black',
		'label'=>'Black'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'yellow',
		'label'=>'Yellow'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'green',
		'label'=>'Green'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'blue',
		'label'=>'Blue'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'orange',
		'label'=>'Orange'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'purple',
		'label'=>'Purple'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'pink',
		'label'=>'Pink'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'red',
		'label'=>'Red'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'color'=>'teal',
		'label'=>'Teal'
	)); ?>
	<div class="ui divider"></div>

	<!--compact-->
	<div class="ui header">Compact</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'compact'=>true,
		'label'=>'Hold'
	)); ?>
	<!--compact-->
	<div class="ui header">Compact</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'compact'=>true,
		'label'=>'Hold'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'compact'=>true,
		'icon'=>'pause'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'compact'=>true,
		'labeled'=>'left',
		'icon'=>'pause',
		'label'=>'Pause'
	)); ?>
	<div class="ui divider"></div>

	<!--compact-->
	<div class="ui header">Toggle</div>
	<div class="ui toggle button">
	  Vote
	</div>
	<div class="ui divider"></div>

	<!--feedback-->
	<div class="ui header">Feedback</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'positive',
		'label'=>'Positive Button'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'context'=>'negative',
		'label'=>'Negative Button'
	)); ?>
	<div class="ui divider"></div>

	<!--fluid-->
	<div class="ui header">Fluid</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'fluid'=>true,
		'label'=>'Fluid Container'
	)); ?>
	<div class="ui divider"></div>

	<!--circular-->
	<div class="ui header">Circular</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'icon'=>'settings'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'social'=>'facebook',
		'icon'=>'facebook',
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'social'=>'twitter',
		'icon'=>'twitter',
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'social'=>'google plus',
		'icon'=>'google plus',
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'social'=>'vk',
		'icon'=>'vk',
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'social'=>'linkedin',
		'icon'=>'linkedin',
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'social'=>'instagram',
		'icon'=>'instagram',
	)); ?>

	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'circular'=>true,
		'social'=>'youtube',
		'icon'=>'youtube',
	)); ?>
	<div class="ui divider"></div>

	<!--vertically attached-->
	<div class="ui header">Vertically Attached</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'attached'=>'top',
		'fluid'=>true,
		'label'=>'Top'
	)); ?>
	<div class="ui attached segment"></div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'attached'=>'bottom',
		'fluid'=>true,
		'label'=>'Bottom'
	)); ?>
	<div class="ui divider"></div>

	<!--horizontally attached-->
	<div class="ui header">Horizontally Attached</div>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'attached'=>'left',
		'label'=>'Top'
	)); ?>
	<?php $this->widget('sui.widgets.SUIButton', array(
		'type'=>'submit',
		'attached'=>'right',
		'label'=>'Bottom'
	)); ?>
	<div class="ui divider"></div>

	<h1 class="ui dividing header">Group Variations</h1>
	<!--vertical group-->
	<div class="ui header">Vertical Group</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'label'=>'Feed', 'fluid'=>true),
			array('type'=>'submit', 'label'=>'Messages', 'fluid'=>true),
			array('type'=>'submit', 'label'=>'Events', 'fluid'=>true),
			array('type'=>'submit', 'label'=>'Photos', 'fluid'=>true)
		),
		'vertical' => true
	)); ?>
	<div class="ui divider"></div>

	<!--icon group-->
	<div class="ui header">Icon Group</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'icon'=>'play'),
			array('type'=>'submit', 'icon'=>'pause'),
			array('type'=>'submit', 'icon'=>'shuffle')
		)
	)); ?>
	<div class="ui divider"></div>

	<!--labeled icon group-->
	<div class="ui header">Labeled Icon Group</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'icon'=>'pause', 'label'=>'Pause', 'fluid'=>true),
			array('type'=>'submit', 'icon'=>'play', 'label'=>'Play', 'fluid'=>true),
			array('type'=>'submit', 'icon'=>'shuffle', 'label'=>'Shuffle', 'fluid'=>true)
		),
		'labeledIcon' => true,
		'vertical' => true,
	)); ?>
	<div class="ui divider"></div>

	<!--mixed group-->
	<div class="ui header">Mixed Group</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit', 'icon'=>'left chevron', 'label'=>'Back', 'labeled'=>'left'),
			array('type'=>'submit', 'icon'=>'stop', 'label'=>'Stop'),
			array('type'=>'submit', 'icon'=>'right chevron', 'label'=>'Forward', 'labeled'=>'right')
		)
	)); ?>
	<div class="ui divider"></div>

	<!--evenly divided-->
	<div class="ui header">Evenly Divided</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'Overview'),
			array('type'=>'submit','label'=>'Specs'),
			array('type'=>'submit','label'=>'Reviews')
		),
		'fluid' => '3'
	)); ?>
	<br/>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'Overview'),
			array('type'=>'submit','label'=>'Specs'),
			array('type'=>'submit','label'=>'Warranty'),
			array('type'=>'submit','label'=>'Reviews'),
			array('type'=>'submit','label'=>'Support')
		),
		'fluid' => 'five'
	)); ?>
	<br/>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','icon'=>'backward'),
			array('type'=>'submit','icon'=>'fast backward'),
			array('type'=>'submit','icon'=>'step backward'),
			array('type'=>'submit','icon'=>'play'),
			array('type'=>'submit','icon'=>'stop'),
			array('type'=>'submit','icon'=>'step forward'),
			array('type'=>'submit','icon'=>'fast forward'),
			array('type'=>'submit','icon'=>'forward'),
			array('type'=>'submit','icon'=>'mute')
		),
		'fluid' => '9'
	)); ?>
	<div class="ui divider"></div>

	<!--colored group-->
	<div class="ui header">Colored Group</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two'),
			array('type'=>'submit','label'=>'Three')
		),
		'color' => 'blue'
	)); ?>
	<div class="ui divider"></div>

	<!--basic group-->
	<div class="ui header">Basic Group</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two'),
			array('type'=>'submit','label'=>'Three')
		),
		'context' => 'basic'
	)); ?>
	<div class="ui divider"></div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One', 'fluid'=>true),
			array('type'=>'submit','label'=>'Two', 'fluid'=>true),
			array('type'=>'submit','label'=>'Three', 'fluid'=>true)
		),
		'context' => 'basic',
		'vertical' => true
	)); ?>
	<div class="ui divider"></div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One', 'context'=> 'basic', 'color'=>'red'),
			array('type'=>'submit','label'=>'Two', 'context'=> 'basic', 'color'=>'blue'),
			array('type'=>'submit','label'=>'Three', 'context'=> 'basic', 'color'=>'green')
		)
	)); ?>

	<!--group sizes-->
	<div class="ui header">Group Sizes</div>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two'),
			array('type'=>'submit','label'=>'Three')
		),
		'size' => 'huge'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two'),
			array('type'=>'submit','label'=>'Three')
		),
		'size' => 'large'
	)); ?>
	<div class="ui divider"></div>

	<div class="ui inverted segment">
		<?php $this->widget('sui.widgets.SUIButtonGroup', array(
			'buttons' => array(
				array('type'=>'submit','label'=>'One', 'inverted'=>true, 'color'=>'red'),
				array('type'=>'submit','label'=>'Two', 'inverted'=>true, 'color'=>'yellow'),
				array('type'=>'submit','label'=>'Three', 'inverted'=>true, 'color'=>'pink')
			),
		)); ?>

		<?php $this->widget('sui.widgets.SUIButtonGroup', array(
			'buttons' => array(
				array('type'=>'submit','icon'=>'align left', 'inverted'=>true, 'context'=>'basic', 'color'=>'red'),
				array('type'=>'submit','icon'=>'align center', 'inverted'=>true, 'context'=>'basic', 'color'=>'yellow'),
				array('type'=>'submit','icon'=>'align right', 'inverted'=>true, 'context'=>'basic', 'color'=>'pink'),
				array('type'=>'submit','icon'=>'align justify', 'inverted'=>true, 'context'=>'basic', 'color'=>'purple')
			),
		)); ?>
	</div>

	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','icon'=>'file'),
			array('type'=>'submit','icon'=>'save'),
			array('type'=>'submit','icon'=>'upload'),
			array('type'=>'submit','icon'=>'download')
		),
		'size' => 'small'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','icon'=>'file'),
			array('type'=>'submit','icon'=>'save'),
			array('type'=>'submit','icon'=>'upload'),
			array('type'=>'submit','icon'=>'download')
		),
		'size' => 'tiny'
	)); ?>
	<br/><br/>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two')
		),
		'conditional' => array('dataText'=>'or'),
		'size' => 'huge'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two')
		),
		'conditional' => array('dataText'=>'or'),
		'size' => 'large'
	)); ?>
	<br/><br/>
	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two')
		),
		'conditional' => array('dataText'=>'or'),
		'size' => 'small'
	)); ?>

	<?php $this->widget('sui.widgets.SUIButtonGroup', array(
		'buttons' => array(
			array('type'=>'submit','label'=>'One'),
			array('type'=>'submit','label'=>'Two')
		),
		'conditional' => array('dataText'=>'or'),
		'size' => 'tiny'
	)); ?>
	<div class="ui divider"></div>
</div>