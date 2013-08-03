<?php
	header( 'Content-type: text/html; charset=utf-8' );
?>
<script type="text/javascript" src="Scripts/jquery-2.0.3.min.js"></script>                       
<script type="text/javascript">

	
	var closeFiles;

	function closeFiles(){
		$.ajax({
		   type: "GET",
		   url: "close.php",
		   data: "fDone=arquivoDone.txt&fSynced=arquivoSynced.txt",
		   success: function(txt){
			$("#closeFiles").html(txt);
		   }
		 });
	}

	function syncFiles(){
		$.ajax({
		   type: "GET",
		   url: "sync.php",
		   data: "fDone=arquivoDone.txt&fSynced=arquivoSynced.txt",
		   success: function(txt){
			$("#sincronizacao").html(txt);
		   }
		 });
	};
	function execCommands(){
		
		$.ajax({
		   type: "GET",
		   url: "exec.php",
		   data: "command=ping www.tca.com.br -c 20&file=arquivoDone.txt",
		   success: function(txt){
			closeFiles = window.setInterval(closeFiles, 500);
		   }
		 });
	};

	var syncFiles = window.setInterval(syncFiles, 200);
	execCommands();

</script>

<div id="sincronizacao"></div>
<div id="closeFiles"></div>

<?php
	ob_flush();
	flush();
?>