<?php
	include('classes/command.class.php');

	//$command = new Command("ping www.tca.com.br -c 120");
	$command = new Command("ping www.terra.com.br -c 10");
	$command->setRealTime(false);
	$command->processCommand();
	echo  $command->getCommand();
	echo '<br />';
	echo $command->getNumResults();
	echo '<pre>';
	print_r($command->getResults());
	echo '</pre>';

	echo $command->getExecutionHumanizedTime();
?>
