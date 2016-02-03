<?php

include 'dblogin.php';
include 'tablereturn.php';



var_dump($_GET);
if (isset($_POST['ttbann'])) 		//CHANGE: Variable supplier shorthands
{
	$form['ttb'] = $_POST['ttbann'];
}

if (isset($_GET['sensor']) and isset($_GET['temp']) and isset($_GET['room']))
{
	try
	{
		$pdo->beginTransaction();
		$values = $_GET['sensor'].','.$_GET['temp'].','.$_GET['room'];
		$pdo->exec('INSERT INTO sensors.Temperature (Sensor_ID, Temperature, Room) values('.$values.')');
		$pdo->commit();
	}
	catch (PDOException $e)
	{
	    $output = 'Error inserting values:' . $e->getMessage();
    	include'output.html.php';
    	exit();
	}
}


$tempvalues = array();

try 			//CHANGE: to use new database; change QUERY and following statements for shorthands
{					
	#$pdo->beginTransaction();
	$basequery = 'SELECT * FROM sensors.Temperature ORDER BY Time DESC';
	$stmt = $pdo->query($basequery);
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

}
catch (PDOException $e)
{
    $output = 'Error getting pricing info:' . $e->getMessage();
    include'output.html.php';
    exit();
}
$tempvalues = $stmt->fetchAll();

#var_dump($tempvalues);



include 'form.html.php';
/*echo "<br>total:";
print_r($quotearray);*/