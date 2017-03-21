<?php
// try {
// 	throw new Exception("Error Processing Request", 42);

// } catch (Exception $e) {
// 	echo "Exception" . $e->getCode() . $e->getMessage() . $e->getFile() . $e->getLine() . "</n>" . $e->__toString();
// 	echo $e;
// }
?>
<?php
/**
*
*/
class fileOpenEx extends Exception

	function __toString()
	{
		return "fileOpenEx ".$this->getCode().": ".$this->getMessage()."<br />"." in".$this->getFile()." on line ".$this->getLine()."<br />";
	}
}
/**
*
*/
class fileWriteEx extends Exception
{

	function __toString()
	{
		return "fileWriteEx ".$this->getCode().": ".$this->getMessage()."<br />"." in".$this->getFile()." on line ".$this->getLine()."<br />";
	}
}
/**
*
*/
class fileLockEx extends Exception
{

	function __toString()
	{
		return "fileLockEx ".$this->getCode().": ".$this->getMessage()."<br />"." in".$this->getFile()." on line ".$this->getLine()."<br />";
	}
}
?>
