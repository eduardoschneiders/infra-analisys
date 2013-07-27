<?php
	class Command{

		var $command;
		var $results;
		var $numResults;
		var $initTime;
		var $endTime;
		var $realTime;
		var $file = 'commands.txt';

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

			if($this->realTime){
				$theCommand = $theCommand . ' > ' . $this->file;
				
				$html = '
                                        <div id="chamaScript">
						<script type="text/javascript" src="Scripts/jquery-2.0.3.min.js"></script>                       
						<script type="text/javascript">
							function teste(){
								$("#teste").append(".");
							}
							var intervalo1 = window.setInterval(teste, 500);
                                                </script>
                                        </div>
                                ';
				
                                echo $html;
				ob_flush();
                                flush();
                                sleep(1);

			}

			$this->initTime = microtime(true);
			exec($theCommand, $result);
			$this->endTime = microtime(true);
			
			if($this->realTime)
					echo '
						<script>
							$(document).ready(function(){
								alert("finished");
								intervalo1 = window.clearInterval(intervalo1);
							});
						</script>
					';
				ob_flush();
                                flush();
                                sleep(1);

				//file_put_contents($this->file, "EOF\n", FILE_APPEND | LOCK_EX);
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
