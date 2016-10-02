<pre><?php

$birdProtocols = file_get_contents("test");
$birdLines = explode("\n", $birdProtocols);

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

	if (count($detail) != 0)
	{
		$status[6] = implode(" ", $detail);
	}

	var_dump($status);
}

