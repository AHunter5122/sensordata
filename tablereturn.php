<?php
mb_internal_encoding("UTF-8");
function Tablegenerate ($tempvalues)
{	
	#var_dump(array_keys($tempvalues[0]));

	echo '<table><tr>';
	foreach (array_keys($tempvalues[0]) as $i)
	{
		echo '<th class = '.$i.'>'.$i.'</th>';
	}
	echo '</tr>';
	foreach ($tempvalues as $row)
	{
		foreach($row as $value)
		{
			echo '<th>'.$value.'</th>';
		}
		echo '</tr>';
	}
	
	echo '</tr>';

		echo "</tr>";
		echo '</table><br>';
}
