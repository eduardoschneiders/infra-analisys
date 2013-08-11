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
			$this->fileSynced = $fileName;
			$f = fopen($this->filePath . $fileName, 'w'); 
			chmod($this->filePath . $this->fileSynced, 0777);
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
				

				$f = fopen($this->filePath . $this->fileDone, 'w'); 
				fwrite($f,''); 
				fclose($f); 

				chmod($this->filePath . $this->fileDone, 0777);
				
				
				$html = '
					<script type="text/javascript" src="Scripts/jquery-2.0.3.min.js"></script>
					<script type="text/javascript">
						
						var closeFiles;'
						
						. $this->closeFiles() 
						. $this->syncFiles() 
						. $this->execCommands() .

						'var syncFiles = window.setInterval(syncFiles, 1000);
						execCommands();

					</script>

					<div id="numCommands">
						<span id="number">0</span> commands executed<span id="extra"> until now</span>!
					</div>
					<ul id="sincronizacao"></ul>
					<div id="closeFiles"></div>
					
                ';
				
                echo $html;
				ob_flush();
                flush();
                sleep(1);

			}
			$this->setResults($result);
		}

		function closeFiles(){
			$html = '
				function closeFiles(){
					$.ajax({
					   type: "GET",
					   url: "close.php",
					   data: "fDone=' . $this->fileDone . '&fSynced=' . $this->fileSynced . '",
					   success: function(txt){
						$("#closeFiles").html(txt);
					   }
					 });
				}
			';

			return $html;
		}

		function syncFiles(){
			$html = '
				function syncFiles(){
					$.ajax({
						type: "GET",
						url: "sync.php",
						data: "fDone=' . $this->fileDone . '&fSynced=' . $this->fileSynced . '",
						success: function(txt){
							if(txt){
								var totalCommands = $("#numCommands #number").html();
								totalCommands = parseInt(totalCommands);
								var total = new Number(totalCommands + 1);
								
								$("#numCommands #number").html(total);
								ts = Math.round((new Date()).getTime() / 1000);
								$("#sincronizacao").append("<li style=\"display: none;\" id=" + ts + ">" + txt + "</li>");	
								$("#sincronizacao li#" + ts).fadeIn(350);
							}
							
						}
					});
				};
			';

			return $html;
		}

		function execCommands(){
			$html = '
				function execCommands(){
					$.ajax({
					   type: "GET",
					   url: "exec.php",
					   data: "command=' . $this->getCommand() . '&file=' . $this->fileDone . '",
					   success: function(txt){
						closeFiles = window.setInterval(closeFiles, 500);
					   }
					 });
				};
			';

			return $html;
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
