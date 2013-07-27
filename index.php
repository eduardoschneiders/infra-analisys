<?php
	header( 'Content-type: text/html; charset=utf-8' );
	echo '<div id="teste">loading: </div>';
	include('classes/command.class.php');
	
	$command = new Command();
	$command->setCommand("ping www.terra.com.br -c 5");
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
