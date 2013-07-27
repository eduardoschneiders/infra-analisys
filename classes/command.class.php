<?php
	class Command{

		var $command;
		var $results;
		var $numResults;
		var $initTime;
		var $endTime;
		var $realTime;
		var $file = 'commands.txt';


		function __construct($theCommand = ""){
			$this->setCommand($theCommand);
				
		}

		function setRealTime($theRealTime = false){
			$this->realTime = $theRealTime;
		}

		function getRealTime(){
			$this->realTime;
		}

		function setCommand($theCommand = ""){
			$this->command = $theCommand;
		}

		function getCommand(){
			return $this->command;
		}

		function processCommand(){

			$theCommand = $this->getCommand();

			if($this->realTime)
				$theCommand = $theCommand . ' > ' . $this->file;

			$this->initTime = microtime(true);
			exec($theCommand, $result);
			$this->endTime = microtime(true);
			
			if($this->realTime)
				file_put_contents($this->file, "EOF\n", FILE_APPEND | LOCK_EX);
			$this->setResults($result);
		}

		function setResults($theResults){
			$this->results =  $theResults;
		}

		function getResults(){
			return $this->results;
		}

		function getNumResults(){
			return count($this->results);
		}

		function getExecutionMicrotime(){
			return $this->endTime - $this->initTime;
		}

		function getExecutionHumanizedTime(){
			$hours = (int)($this->getExecutionMicrotime()/60/60);
			$minutes = (int)($this->getExecutionMicrotime()/60)-$hours*60;
			$seconds = $this->getExecutionMicrotime()-$hours*60*60-$minutes*60;

			if($hours)
				$time = $hours . ' Horas ';
			if($minutes)
				$time .= $minutes . ' Minutos ';
			if($seconds)
				$time .= $seconds . ' Segundos ';

			return $time;
		}
	}
