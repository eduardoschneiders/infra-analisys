<?php
$fDone = $_GET['fDone'];
$fSynced = $_GET['fSynced'];
//echo '1321';
// echo '<p>' . filesize('generatedFiles/' . $fDone) . '</p>';
ob_flush();
flush();
$fDone = file('generatedFiles/' . $fDone);
$fSynced = file('generatedFiles/' . $fSynced);


$fNumDone = count($fDone);

$fNumSynced = count($fSynced);

if($fNumDone == $fNumSynced){

	echo '
			<script type="text/javascript">
				intervalo1 = window.clearInterval(syncFiles);
				bla = window.clearInterval(closeFiles);
			</script>
	';

	unlink('generatedFiles/' . $_GET['fDone']);
	unlink('generatedFiles/' . $_GET['fSynced']);
}