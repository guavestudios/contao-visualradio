<?php

namespace Guave\VisualRadio;

use Contao\Widget;

class WidgetVisualRadio extends Widget {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget';

	protected $blnSubmitInput = true;

	public $imageext = ".jpg";

	public function validator($varInput) {
		return $varInput;
	}

	public function generate()
	{
		$activeRecord = $this->activeRecord;

		$html = '<div>';
		foreach($this->options as $k=>$option) {
			$id = $this->strName.'-'.$k;
			$image = $this->imagepath.'/'.$option['value'].$this->imageext;
			$active = $this->varValue == $option['value'];
			$html .= '<div style="width:25%;display: inline-block;text-align:center;margin-bottom:20px;">';
			$html .= '<input type="radio" id="'.$id.'" name="'.$this->strName.'" value="'.$option['value'].'" '.( $active?'checked':'' ).' /> ';
			$html .= '<label for="'.$id.'">';
			$html .= \Image::getHtml($image, $option['name'], 'title="'.specialchars($option['name']).'"');
			$html .= '</label>';
			$html .= '</div>';
		}

		$html .= '</div>';


		return '<div>'.$html.'</div>';
	}

}
