<?php
/**
 *##  SUIButtonGroup class file.
 */

Yii::import('sui.widgets.SUIButton');

/**
 *## Semantic UI button group widget.
 * @see http://semantic-ui.com/elements/button.html#buttons
 * @package sui.widgets.forms.buttons
 */
class SUIButtonGroup extends CWidget {
	
	// Toggle options.
	//const TOGGLE_CHECKBOX = 'checkbox';
	//const TOGGLE_RADIO = 'radio';

	/**
	 * @var string the button type.
	 * @see BootButton::buttonType
	 */
	public $type = SUIButton::BUTTON_BUTTON;

	/**
	 * @var string the button context.
	 * @see BootButton::type
	 */
	public $context = SUIButton::CONTEXT_DEFAULT;
	
	/**
	 * @var string the button size.
	 * @see BootButton::size
	 */
	public $size;

	/**
	 * @var boolean indicates whether to encode the button labels.
	 */
	public $encodeLabel = true;

	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * @var array the button configuration.
	 */
	public $buttons = array();

	/**
	 * @var boolean indicates whether button is disabled or not. Defaults to 'false'.
	 */
	public $disabled = false;

	/**
	 * @var array the conditonal configuration.
	 */
	public $conditional = array();

	/**
	 * @var boolean indicates whether the button group appears vertically stacked.
	 */
	public $vertical = false;

	/**
     * @var boolean the labeled icon button.
     */
    public $labeledIcon = false;

    /**
     * @var mixed the button group divisor. e.g. 2 or 'two'.
	 * @see http://semantic-ui.com/elements/button.html#evenly-divided
     */
    public $fluid;

    /**
     * @var string the button group color.
     * @see http://semantic-ui.com/elements/button.html#colored-group
     */
    public $color;

	/**
	 *### .init()
	 *
	 * Initializes the widget.
	 */
	public function init() {
		if ($this->fluid)
			$classes[] = $this->fluid . ' fluid';

		if ($this->color)
			$classes[] = $this->color;

		if ($this->size)
			$classes[] = $this->size;

		$classes[] = 'ui buttons';

		if ($this->vertical)
			$classes[] = 'vertical';

		if ($this->labeledIcon)
			$classes[] = 'labeled icon';

		if ($this->context) {
			$classes[] = $this->context;
		}

		if (!empty($classes)) {
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class'])) {
				$this->htmlOptions['class'] .= ' ' . $classes;
			} else {
				$this->htmlOptions['class'] = $classes;
			}
		}
	}

	/**
	 *### .run()
	 *
	 * Runs the widget.
	 */
	public function run() {
		
		echo CHtml::openTag('div', $this->htmlOptions);

		foreach ($this->buttons as $key => $button) {
			if (isset($button['visible']) && $button['visible'] === false) {
				continue;
			}
			$this->controller->widget('sui.widgets.SUIButton', array(
					'type' => isset($button['type']) ? $button['type'] : $this->type,
					'context' => isset($button['context']) ? $button['context'] : null,
					'size' => isset($button['size']) ? $button['size'] : null,
					'icon' => isset($button['icon']) ? $button['icon'] : null,
					'label' => isset($button['label']) ? $button['label'] : null,
					'url' => isset($button['url']) ? $button['url'] : null,
					'fluid' => isset($button['fluid']) ? $button['fluid'] : false,
					'active' => isset($button['active']) ? $button['active'] : false,
					'disabled' => isset($button['disabled']) ? $button['disabled'] : false,
					'ajaxOptions' => isset($button['ajaxOptions']) ? $button['ajaxOptions'] : array(),
					'htmlOptions' => isset($button['htmlOptions']) ? $button['htmlOptions'] : array(),
					'encodeLabel' => isset($button['encodeLabel']) ? $button['encodeLabel'] : $this->encodeLabel,
					'animated' => isset($button['animated']) ? $button['animated'] : array(),
					'labeled' => isset($button['labeled']) ? $button['labeled'] : null,
					'color' => isset($button['color']) ? $button['color'] : null,
					'inverted' => isset($button['inverted']) ? $button['inverted'] : false,
					'social' => isset($button['social']) ? $button['social'] : null,
					'compact' => isset($button['compact']) ? $button['compact'] : false,
					'circular' => isset($button['circular']) ? $button['circular'] : false,
					'loading' => isset($button['loading']) ? $button['loading'] : false,
					'attached' => isset($button['attached']) ? $button['attached'] :null
				)
			);
			if ($this->isConditional() && count($this->buttons) > ($key+1)){
				echo '<div class="or" data-text="'. $this->conditional['dataText'] .'"></div>';
			}
		}
		echo CHtml::closeTag('div');
	}

	/**
	 *### .isConditional()
	 *
	 * Returns whether the button has animation or not.
	 *
	 * @return boolean the result.
	 */
	protected function isConditional() {
		return isset($this->conditional) && !empty($this->conditional);
	}
}
