<?php

//require 'class.style.php';
//require 'exceptions/class.styleexception.php';

include_once 'phpodt.php';

/**
 * A Class representing style properties for autolists.
 *
 * @author ejs
 */

class AutoListStyle {

	/**
	 * The DOMDocument representing the styles xml file
	 * @access private
	 * @var DOMDocument
	 */
	protected $styleDocument;
	/**
	 * The name of the style
	 * @access private
	 * @var string
	 */
	protected $name;
	/**
	 * The DOMElement representing this style
	 * @access private
	 * @var DOMElement
	 */
	protected $styleElement;

	/**
	 * The constructor initializes the properties, then creates a <text:list-style>
	 * element representing this specific style, and add it to <office:styles> element
	 *
	 * @param DOMDocument $styleDoc
	 * @param string $name
	 */
	function __construct($name) {
		$this->styleDocument = ODT::getInstance()->getStyleDocument();
		$this->name = $name;
		$this->styleElement = $this->styleDocument->createElement('text:list-style');
		$this->styleElement->setAttribute('style:name', $name);
		$this->styleElement->setAttribute('style:display-name', $name);
		$this->styleDocument->getElementsByTagName('office:styles')->item(0)->appendChild($this->styleElement);
	}

	/**
	 * return the name of this style
	 * @return string
	 */
	function getStyleName() {
		return $this->name;
	}

	public function setStyleName($name) {
		$this->name = $name;
	}


}

?>
