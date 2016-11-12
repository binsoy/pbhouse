<?php 

	function int2Gender($gender) {
		switch($gender) {
			case 1:
				$result = "Male";
				break;
				
			case 2:
				$result = "Female";
				break;
				
			default:
				$result = "N/A";
		}
		
		return $result;
	}

?>