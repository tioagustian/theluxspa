<?php 

	function getDurationArray()
	{
		$duration = [15,30,45,60,75,90];
		return $duration;
	}

	function getDurationValue($value)
	{
		$duration = [15,30,45,60,75,90];
		$index = explode(',', $value);
		$result = $duration[$index[0]];
		for ($i = 1; $i < count($index); $i++) { 
			$result .= ', ' . $duration[$index[$i]];
		}
		return $result;
	}

?>