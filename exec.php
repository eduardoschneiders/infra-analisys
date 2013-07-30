<?php
echo '<br />Executando Ping: <br />';
sleep(1);
exec("ping tca.com.br -c 40 > generatedFiles/arquivoDone.txt");
ob_flush();
flush();
echo '<br />Ping concluído! <br />';
