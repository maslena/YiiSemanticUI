<?php
/**
 *##  SUIButtonGroupColumn class file.
 */

Yii::import('sui.widgets.SUIButtonColumn');

class SUIButtonGroupColumn extends SUIButtonColumn {

	/**
	 * @var string the button size.
	 */
	public $size = 'tiny';

	/**
	 * @var boolean the button group vertical align.
	 */
	public $vertical = false;

	/**
	 * @var string the view button context.
	 */
	public $viewButtonContext = 'primary';

	/**
	 * @var string the update button context.
	 */
	public $updateButtonContext = 'positive';

	/**
	 * @var string the delete button context.
	 */
	public $deleteButtonContext = 'negative';

	/**
	 *### .initDefaultButtons()
	 *
	 * Initializes the default buttons (view, update and delete).
	 */
	protected function initDefaultButtons() {
		
		parent::initDefaultButtons();

		if ($this->viewButtonContext !== false && !isset($this->buttons['view']['context'])) {
			$this->buttons['view']['context'] = $this->viewButtonContext;
		}
		if ($this->updateButtonContext !== false && !isset($this->buttons['update']['context'])) {
			$this->buttons['update']['context'] = $this->updateButtonContext;
		}
		if ($this->deleteButtonContext !== false && !isset($this->buttons['delete']['context'])) {
			$this->buttons['delete']['context'] = $this->deleteButtonContext;
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
		$options['class'] .= ' ui button';
		if (isset($button['context'])) {
			$options['class'] .= ' ' . $button['context'];
		}

		if ((isset($button['icon']) && $button['icon']) || 
			(isset($button['imageUrl']) && is_string($button['imageUrl']))) {
			$options['class'] .= ' animated';

			if (isset($this->animationType))
				$options['class'] .= ' ' . $this->animationType;

		}

		if (isset($button['icon'])) {
			$html = '<div class="hidden content">' . $label . '</div>';
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

	/**
	 *### .renderDataCellContent()
	 *
	 * Renders the data cell content.
	 * This method renders the view, update and delete buttons in the data cell.
	 *
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row, $data)
	{
		$tr = array();
		ob_start();
		foreach ($this->buttons as $id => $button) {
			$this->renderButton($id, $button, $row, $data);
			$tr['{' . $id . '}'] = ob_get_contents();
			ob_clean();
		}
		ob_end_clean();
		$vertical = "";
		if($this->vertical)
			$vertical = " vertical";
		echo "<div class='ui buttons{$vertical} {$this->size}'>" . strtr($this->template, $tr) . "</div>";
	}
}
