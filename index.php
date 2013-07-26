<?php
	include('classes/command.class.php');

	$command = new Command("ping 192.168.100.124 -c 6");


	echo $command->getCommand();
	echo '<br />';
	echo $command->getNumResults();
	echo '<pre>';
	print_r($command->getResults());
	echo '</pre>';

	echo $command->getExecutionHumanizedTime();
?>