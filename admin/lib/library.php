<?php
	class cplib{
		function db_connect(){
			global	$db_host, $db_user, $db_pass , $db_name ;

			$dcon=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
			
		}

		function rdirect( $loc ) {
	  		header( 'location: ' . $loc );
	  		exit();
		}

		function slctQuery($tbl,$fld="",$whr="",$ordr="")
		{
			$query=mysqli_query("Select $fld from $tbl $whr $ordr", MYSQLI_USE_RESULT) or die("Syntax error in Select Query");
			return $query;
		}
	}
?>