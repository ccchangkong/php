<?php
class Page {
	public $content;
	public $title = "index";
	public $btns = array("home" => "home.php",
		"content" => "content.php",
		"services" => "services.php",
		"map" => "map");
	public function __set($name,$value)
	{
		$this->$name=$value;
	}
	public function Display()
	{
		echo "<html>\n<head>\n";
		$this->DisplayTitle();
		$this->DisplayStyles();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayMenu($this->btns);
		$this->content;
		$this->DisplayFooter();
		echo "</body>\n</html>\n";
	}
	public function DisplayTitle()
	{
		# code...
		echo "<title>".$this->title."</title>";

	}
	public function DisplayStyles()
	{

		# code...
?>
	<style>
	p{font-size: 1rem;}
	</style>
<?php
	}
	public function DisplayHeader()
	{
?>
	<h1>header</h1>
<?php
	}
	public function DisplayMenu($btns)
	{
	echo "<div>\n";
	$width=100/count($btns);
	while (list($name,$url)=each($btns)) {
		$this->DisplayBtn($width,$name,$url,!$this->IsURLCurrentPage($url));
	}
	echo "</div>";
		# code...
	}
	public function IsURLCurrentPage($url)
	{
		if (strpos($_SERVER['PHP_SELF'], $url)==false) {
			return false;
		}
		else{
			return true;
		}
		# code...
	}
	public function DisplayBtn($width,$name,$url,$active=true)
	{
	if ($active) {
		echo "<div width=\"".$width."%\">
		<a href=\"".$url."\">
		<p>".$name."</p>
		</a>
		</div>";
	}
	# code...
	}
	public function DisplayFooter()
	{
?>
	<footer>footer</footer>
<?php
	}
	}
?>

