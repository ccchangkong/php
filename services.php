<?php
require 'class.inc';
class ServicesPage extends Page {
	private $row2btns = array(
		"Re-engineering" => "reengineering.php",
		"Standards" => "standards.php",
	);
	public function Display() {
		echo "<html>\n<head>\n";
		$this->DisplayTitle();
		$this->DisplayStyles();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayMenu($this->btns);
		$this->DisplayMenu($this->row2btns);
		$this->content;
		$this->DisplayFooter();
		echo "</body>\n</html>\n";
	}
}
$services = new ServicesPage();
$services->content = "<p>services</p>";
$services->Display();
?>
