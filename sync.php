<?php
$fDone = $_GET['fDone'];
$fSynced = $_GET['fSynced'];
//echo '1321';
echo '<p>' . filesize('generatedFiles/' . $fDone) . '</p>';
ob_flush();
flush();
$fDone = file('generatedFiles/' . $fDone);
$fSynced = file('generatedFiles/' . $fSynced);


$fNumDone = count($fDone);

$fNumSynced = count($fSynced);
// $teste = strpos($fDone[$fNumDone - 1], "tca");

// var_dump(strstr($fDone[$fNumDone - 1], "\n"));
// echo '<pre>';
// print_r($fDone[$fNumDone - 1]);
// echo '<pre>';
// echo $fDone[$fNumDone - 1];

$filename = 'generatedFiles/' . $_GET['fDone'];

$fh = fopen($filename, 'r');
$line = 1;

while (($buffer = fgets($fh)) !== FALSE) {
	if ($line == $fNumSynced + 1) {
		$breakLine = FALSE;
       	if(strpos($buffer, "\n")) 
	    	$breakLine = TRUE;
       break;
   }   
   $line++;
}

if(($fNumDone && $fNumDone != $fNumSynced && $breakLine)){
	$filename = 'generatedFiles/' . $_GET['fSynced'];
	echo $fDone[$fNumSynced];


	$fp = fopen('generatedFiles/' . $_GET['fSynced'], 'a'); 

	flock($fp,LOCK_SH); 

	if(is_writable('generatedFiles/' . $_GET['fSynced']))
		$written = fputs($fp, $fDone[$fNumSynced]); 

	fclose($fp); 
}

