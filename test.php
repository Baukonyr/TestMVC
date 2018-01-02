<?php
//function_include
function foo($data, $pai=0, $level=0)
{
global $array;
foreach($data as $values)
 {					
 	if($values['parent_id'] == $pai)
	{
	 $vis = str_pad('',$level*5, '.').$values['main_name'] . '<br>';
	 echo $vis;
	if($values['id'] == null) // Костыль, но пока не знаю как решить
		{
			break;
		}
		foo($data, $values['id'], $level+1);
							
	}
						
}
}


//db_config
//Конфигурация для базы данных.

define("DBHOST", "host");
define("DBNAME", "dbName");
define("DBUSERNAME", "dbLogo");
define("DBUSERPASS", "dbPass");

//db_connect

$connect = mysqli_connect(DBHOST, DBUSERNAME, DBUSERPASS, DBNAME);

//show_information_table 
// Попробуем вывести дерево.

$query = "SELECT * FROM family_uk";
$result = mysqli_query($connect, $query);



while($array[] = mysqli_fetch_array($result, MYSQLI_ASSOC));


foo($array);
		
		
?>
