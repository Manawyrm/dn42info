<?php 
include("config.php");

if ($_GET['key'] != "keyhier")
	die();

$birdProtocols = file_get_contents($_FILES['upload']['tmp_name']);

$birdLines = explode("\n", $birdProtocols);
$result = array();

foreach ($birdLines as $birdLine)
{
	// Split at space characters
	$elements = explode(" ", $birdLine);
	// Sort out all entries where strlen == 0; all empty strings
	$elements = array_filter($elements, 'strlen');
	// reorder the array keys to numerical values
	$elements = array_values($elements);

	$status = array_slice ( $elements , 0 , 6 );
	$detail = array_slice ( $elements , 6 ); 
	//var_dump($status);

	if (count($detail) != 0)
	{
		$status[6] = implode(" ", $detail);
	}

	if (count($status) != 0)
		$result[] = $status;

}

$result = array_slice ( $result , 5 ); 

var_dump(count($result));

if ($_GET['protocol'] == "ipv6")
{
	file_put_contents("bird6.json", json_encode($result));
}
else
{
	file_put_contents("bird4.json", json_encode($result));
}
?>