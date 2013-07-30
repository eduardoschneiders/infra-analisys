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

if($fNumDone && $fNumDone != $fNumSynced){
	echo $fDone[$fNumSynced];
	file_put_contents('generatedFiles/' . $_GET['fSynced'], $fDone[$fNumSynced], FILE_APPEND | LOCK_EX);
}