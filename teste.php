<?php
	header( 'Content-type: text/html; charset=utf-8' );
?>
<script type="text/javascript" src="Scripts/jquery-2.0.3.min.js"></script>                       
<script type="text/javascript">

	
	var bla;

	function closeFiles(){
		$.ajax({
		   type: "GET",
		   url: "close.php",
		   data: "fDone=arquivoDone.txt&fSynced=arquivoSynced.txt",
		   success: function(txt){
			$("#final").html(txt);
		   }
		 });
	}

	function loadResults(){
		$.ajax({
		   type: "GET",
		   url: "sync.php",
		   data: "fDone=arquivoDone.txt&fSynced=arquivoSynced.txt",
		   success: function(txt){
			$("#result").html(txt);
		   }
		 });
	};
	function loadResults2(){
		
		$.ajax({
		   type: "GET",
		   url: "exec.php",
		   data: "",
		   success: function(txt){
			bla = window.setInterval(closeFiles, 500);
			$("#result2").append(txt);
		   }
		 });
	};

	var carregaResultados = window.setInterval(loadResults, 200);
	loadResults2();

</script>

<div id="result">Loading: </div>
<div id="result2">Loading: </div>
<div id="final">Final: </div>

<?php
	ob_flush();
	flush();
?>