<?php
/**
 * SUIButtonColumn class file.
 */
Yii::import('zii.widgets.grid.CButtonColumn');

/**
 *## Semantic UI button column widget.
 * Used to set buttons to use Semantic UI icon instead of the defaults images.
 * @package sui.widgets.grids.columns
 */
class SUIButtonColumn extends CButtonColumn {
	
	/**
	 * @var string the button size.
	 */
	public $size = 'tiny';

	/**
	 * @var string the button animation type.
	 */
	public $animationType;

	/**
	 * @var string the view button icon.
	 */
	public $viewButtonIcon = 'eye icon';

	/**
	 * @var string the update button icon.
	 */
	public $updateButtonIcon = 'pencil icon';

	/**
	 * @var string the delete button.
	 */
	public $deleteButtonIcon = 'trash icon';

	/**
	 *### .initDefaultButtons()
	 *
	 * Initializes the default buttons (view, update and delete).
	 */
	protected function initDefaultButtons() {
		
		parent::initDefaultButtons();

		if ($this->viewButtonIcon !== false && !isset($this->buttons['view']['icon'])) {
			$this->buttons['view']['icon'] = $this->viewButtonIcon;
		}
		if ($this->updateButtonIcon !== false && !isset($this->buttons['update']['icon'])) {
			$this->buttons['update']['icon'] = $this->updateButtonIcon;
		}
		if ($this->deleteButtonIcon !== false && !isset($this->buttons['delete']['icon'])) {
			$this->buttons['delete']['icon'] = $this->deleteButtonIcon;
		}
	}

	/**
	 *### .renderButton()
	 *
	 * Renders a link button.
	 *
	 * @param string $id the ID of the button
	 * @param array $button the button configuration which may contain 'label', 'url', 'imageUrl' and 'options' elements.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data object associated with the row
	 */
	protected function renderButton($id, $button, $row, $data) {
		
		if (isset($button['visible']) && !$this->evaluateExpression(
			$button['visible'],
			array('row' => $row, 'data' => $data)
		)
		) {
			return;
		}

		$label = isset($button['label']) ? $button['label'] : $id;
		$url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row))
			: '#';
		$options = isset($button['options']) ? $button['options'] : array();

		if (!isset($options['title'])) {
			$options['title'] = $label;
		}

		if (!isset($options['class'])) {
			$options['class'] = '';
		}
		$options['class'] .= ' ui button ' . $this->size;

		if ((isset($button['icon']) && $button['icon']) || 
			(isset($button['imageUrl']) && is_string($button['imageUrl']))) {
			$options['class'] .= ' animated';

			if (isset($this->animationType))
				$options['class'] .= ' ' . $this->animationType;

		}

		if (isset($button['icon']) && $button['icon']) {
			$html = '<div class="hidden content">'. $label .'</div>';
			$html .= '<div class="visible content"><i class="' . $button['icon'] . '"></i></div>';			
			echo CHtml::link($html, $url, $options);
		} else if (isset($button['imageUrl']) && is_string($button['imageUrl'])) {
			$html = '<div class="hidden content">'. $label .'</div>';
			$html .= '<div class="visible content">' . CHtml::image($button['imageUrl'], $label) . '</div>';
			echo CHtml::link($html, $url, $options);
		} else {
			echo CHtml::link($label, $url, $options);
		}
	}
}
