<?php
$fDone = $_GET['fDone'];
$fSynced = $_GET['fSynced'];

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
echo $fNumSynced;

while (($buffer = fgets($fh)) !== FALSE) {
	echo '<p>' . $line . '</p>';
	if ($line == $fNumSynced + 1) {
		echo "here";
		echo $buffer;
		echo "here";
		$breakLine = FALSE;
       	if(strpos($buffer, "\n")){
       		$breakLine = TRUE;
       		echo 'askjdfl';
       	}
	    	
       break;
   }   
   $line++;
}

exit();
if(($fNumDone && $fNumDone != $fNumSynced && $breakLine)){
	$filename = 'generatedFiles/' . $_GET['fSynced'];
	echo $fDone[$fNumSynced];


	$fp = fopen('generatedFiles/' . $_GET['fSynced'], 'a'); 

	flock($fp,LOCK_SH); 

	if(is_writable('generatedFiles/' . $_GET['fSynced']))
		$written = fputs($fp, $fDone[$fNumSynced]); 

	fclose($fp); 
}

