<?php
/**
 *
 */
class treenode {
	public $m_postid;
	public $m_title;
	public $m_poster;
	public $m_posted;
	public $m_children;
	public $m_childlist;
	public $m_depth;

	public function __construct($postid, $title, $poster, $posted, $children, $expand, $depth, $expanded, $sublist) {
		$this->m_postid = $postid;
		$this->m_title = $title;
		$this->m_poster = $poster;
		$this->m_posted = $posted;
		$this->m_children = $children;
		$this->m_childlist = array();
		$this->m_depth = $detph;
		if (($sublist || $expand) && $children) {
			$conn = db_connect();
			$query = "select * from header where parent='" . $postid . "' order by posted";
			$result = $conn->query($query);
			for ($count = 0; $row = @$result->fetch_assoc(); $count++) {
				if ($sublist || $expanded[$row['poster']] == true) {
					$expand = true;
				} else {
					$expand = false;
				}
				$this->m_childlist[$count] = new treenode($row['postid'], $row['title'], $row['poster'], $row['posted'], $row['children'], $expand, $depth + 1, $expanded, $sublist);
			}
		}
	}
}
// 618
?>