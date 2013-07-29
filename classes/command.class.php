<?php
	class Command{

		var $command;
		var $results;
		var $numResults;
		var $initTime;
		var $endTime;
		var $realTime;
		var $fileDone = 'commandsDone.txt';
		var $fileSynced = 'commandsSynced.txt';
		var $filePath = 'generatedFiles/';

		function setRealTime($theRealTime = false){
			$this->realTime = $theRealTime;
		}

		function setFileDone($theFile = NULL){
			$this->fileDone = $theFile;
		}
		
		function createSyncFile($fileName = NULL){
			$this->fileSynced = $filename;
			$f = fopen($this->filePath . $fileName, 'w'); 
			fwrite($f,''); 
			fclose($f); 
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

			if($this->realTime){
				chmod($this->filePath . $this->fileDone, "0777");
				
				$theCommand = $theCommand . ' > ' . $this->filePath . $this->fileDone;
				
				$html = '
					<script type="text/javascript" src="Scripts/jquery-2.0.3.min.js"></script>                       
					<script type="text/javascript">
						function loadResults(){
							$("#result").append(".");
						}
						var intervalo1 = window.setInterval(loadResults, 500);
					</script>
                ';
				
                echo $html;
				ob_flush();
                flush();
                sleep(1);

			}

			$this->initTime = microtime(true);
			exec($theCommand, $result);
			$this->endTime = microtime(true);
			
			if($this->realTime){
				echo '
					<script>
						$(document).ready(function(){
							intervalo1 = window.clearInterval(intervalo1);
						});
					</script>
				';
				ob_flush();
                                flush();
                                sleep(1);


			}
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
