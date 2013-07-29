<?php
$fDone = $_GET['fDone'];
$fSynced = $_GET['fSynced'];

$fDone = file('generatedFiles/' . $fDone);
$fSynced = file('generatedFiles/' . $fSynced);

$fNumDone = count($fDone);
$fNumSynced = count($fSynced);

if($fNumDone && $fNumDone != $fNumSynced){
	echo 'hasdouh';
}