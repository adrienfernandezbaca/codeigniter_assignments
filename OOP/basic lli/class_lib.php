<?php 
class HTMLHelper{

	function print_table($array)
	{
		$html = '<table class="table"><tr><th>The keys</th><th>The values</th></tr>';

		foreach ($array as $row){
			foreach ($row as $key => $value) {
			$html .= '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';		
			}
		}
		$html .= '</table>';
		return $html;
	}


	function print_select($name, $array)
	{
		$html = '<select name='.$name.'>';
		foreach ($array as $value) {
			$html .= '<option value='.$value.'>'.$value.'</option>';
		}
		$html .= '</select>';
		return $html;
	}


}
 ?>