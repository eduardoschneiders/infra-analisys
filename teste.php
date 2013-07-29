<script type="text/javascript" src="Scripts/jquery-2.0.3.min.js"></script>                       
<script type="text/javascript">
	function loadResults(){
		$.ajax({
		   type: "GET",
		   url: "sync.php",
		   data: "fDone=commandsDone_393bde979876425b5fd6ff490aa8cb40.txt&fSynced=commandsSynced_393bde979876425b5fd6ff490aa8cb40.txt",
		   success: function(txt){
			 $("#result").append(txt);
			 
		   }
		 });
		
	}
	var intervalo1 = window.setInterval(loadResults, 500);
</script>

<div id="result">Loading: </div>

<?php
	exec("ping tca.com.br -c 30 > arquivo.txt");
?>