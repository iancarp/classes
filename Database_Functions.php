<?php

/*/////////////////////////////////////////

The function database_connect follows the following format for connectivity...

database_connect('SELMA Log Viewer','MySQL','SELECT * FROM traplog');

If no values are specified it will default to the website database and MsSQL

*//////////////////////////////////////////

function database_connect($page,$database_type,$query)   {
///////////////////////////////////////////
// Set Database connectivety attributes  //
///////////////////////////////////////////
	If ($page=='SELMA Log Viewer') { // SELMA Log Viewer
		  $host = 'LO2412';
		  $database = 'vistalink';
		  $user = '';
		  $password = '';
	}
	elseif ($page=='Television Log') { // Television Log
		  $host = 'LO2352SQL';
		  $database = 'TelevisionLog';
		  $user = 'tvlog';
		  $password = 'tvlogp';
	}
	elseif ($page=='Shopwindow Reports') { // Shopwindow report database
		  $host = 'LONTV102';
		  $database = 'mpgsurvey';
		  $user = 'vidstor';
		  $password = 'vidstorp';
	} 
	elseif ($page=='Shopwindow Database') { // Shopwindow report database AMX System Info
		  $host = 'LONTV102';
		  $database = 'AllDigital';
		  $user = 'vidstor';
		  $password = 'vidstorp';
	} 
	elseif ($page=='AMX System Info') { // Default
		  $host = 'LO2352SQL';
		  $database = 'AMX';
		  $user = 'webuser';
		  $password = 'webaccess';
	}
	elseif ($page=='StoryManagerUK') { // UK StoryManager Database
		  $host = 'LO2352SQL';
		  $database = 'UK';
		  $user = 'maestro';
		  $password = 'maestro';
	}
	elseif ($page=='StoryManagerUK') { // FR StoryManager Database
		  $host = 'LO2352SQL';
		  $database = 'FRANCE';
		  $user = 'maestro';
		  $password = 'maestro';
	}
	elseif ($page=='StoryManagerUK') { // IT StoryManager Database
		  $host = 'LO2352SQL';
		  $database = 'ITALY';
		  $user = 'maestro';
		  $password = 'maestro';
	}
	elseif ($page=='StoryManagerUK') { // SP StoryManager Database
		  $host = 'LO2352SQL';
		  $database = 'SPAIN';
		  $user = 'maestro';
		  $password = 'maestro';
	}
	elseif ($page=='StoryManagerUK') { // GR StoryManager Database
		  $host = 'LO2352SQL';
		  $database = 'GERMANY';
		  $user = 'maestro';
		  $password = 'maestro';
	}
	else { // Default
		  $host = 'LO2352SQL';
		  $database = 'website';
		  $user = 'webuser';
		  $password = 'webaccess';
	} //AMX System Info
///////////////////////////////////////////
// Set Data base database type           //
///////////////////////////////////////////
	If($database_type=='MySQL') { /// If database is MySQL

	  	$connection = mysql_connect($host, $user, $password) or die ("Couldn't connect to server.");
	  	$db = mysql_select_db($database ,$connection) or die ("Couldn't select database.");
		$result = mysql_query($query, $connection) or die("Query failed please check the search criteria: " . mysql_error());
        return $result;
		mysql_close($connection);
		}
	else { // Sets Default connection as MsSQL

	  	$connection = mssql_connect($host, $user, $password) or die ("Couldn't connect to server.");
	  	$db = mssql_select_db($database ,$connection) or die ("Couldn't select database.");
		$result = mssql_query($query, $connection) or die('Query failed please check the search criteria: ');
        return $result;
		mssql_close($connection);
	}
	//return $result;

} // Ends database_connect function


?>

