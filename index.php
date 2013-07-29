<?php
	header( 'Content-type: text/html; charset=utf-8' );
	echo '<div id="teste">loading: </div>';

	include('classes/command.class.php');

	$md5Time = md5(microtime());


	$command = new Command();
	$command->setCommand("traceroute www.tca.com.br");
	$command->setFile("commandsDone_" . $md5Time . '.txt');
	$command->createSyncFile("commandsSynced_" . $md5Time . '.txt');
	$command->setRealTime(true);
	$command->processCommand();
	echo  $command->getCommand();
	echo '<br />';
	echo $command->getNumResults();
	echo '<pre>';
	print_r($command->getResults());
	echo '</pre>';

	echo $command->getExecutionHumanizedTime();
?>
