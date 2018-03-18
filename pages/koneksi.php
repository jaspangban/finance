<?
mysql_connect('localhost', 'root', '') ;
mysql_select_db('db_farm');

function get_menu($data, $parent = 0) {
	static $i = 1;
	$tab = str_repeat("\t\t", $i);
	if ($data[$parent]) {
		$html = "\n$tab<ul>";
		$i++;
		foreach ($data[$parent] as $v) {
			$child = get_menu($data, $v->id);
			$html .= "\n\t$tab<li>";
			$html .= '<a href="'.$v->url.'">'.$v->title.'</a>';
			if ($child) {
				$i--;
				$html .= $child;
				$html .= "\n\t$tab";
			}
			$html .= '</li>';
		}
		$html .= "\n$tab</ul>";
		return $html;
	} else {
		return false;
	}
}


$result = mysql_query("SELECT * FROM menu ORDER BY menu_order");
while ($row = mysql_fetch_object($result)) {
	$data[$row->parent_id][] = $row;
}

$menu = get_menu($data);
?>