<?php
	class Command{

		var $command;
		var $results;
		var $numResults;


		function __construct($theCommand = ""){
			$this->setCommand($theCommand);
			$this->processCommand($theCommand);
		}

		function setCommand($theCommand = ""){
			$this->command = $theCommand;
		}

		function getCommand(){
			return $this->command;
		}

		function processCommand($theCommand){
			exec($theCommand, $result);

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
	}
