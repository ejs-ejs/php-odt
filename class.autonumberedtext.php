<?php

require_once 'class.odt.php';

/**
 * A Class representing autonumbered text.
 *
 * @author ejs
 */

class AutoNumberedText {

//	private $contentDocument;
	private $pElement;
	private $documentContent;

	/**
	 *
	 * @param DOMDocument $contentDoc The DOMDocument instance of content.xml
	 * @param <type> $pStyle A ParagraphStyle object representing paragraph style properties
	 */
	public function __construct($pStyle = null, $addToDocument = true) {
		$this->documentContent = ODT::getInstance()->getDocumentContent();
		$this->pElement = $this->documentContent->createElement('text:list');
		$this->pElement->setAttribute('text:continue-numbering', 'true');

		if ($pStyle != null) {
			$this->pElement->setAttribute('text:style-name', $pStyle->getStyleName());
		}
		if ($addToDocument) {
			$this->documentContent->getElementsByTagName('office:text')->item(0)->appendChild($this->pElement);
		}
	}

	/**
	 * Add a non-styled text
	 * @param string $content
	 */
	public function addText($contents= NULL,$styles = NULL) {
       $autotext = $this->documentContent->createElement('text:list-item');
       $p = $this->documentContent->createElement('text:p', $contents);
        $autotext->appendChild($p);
       $this->pElement->appendChild($autotext);
	}



	/*
	 * Get the DOMElement representing this text
	 * @return DOMElement
	 */
	public function getDOMElement() {
		return $this->pElement;
	}
}

?>
