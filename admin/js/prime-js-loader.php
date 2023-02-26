<?php
include_once("../config.php");

header('Content-Type: application/javascript');
$js=file_get_contents('prime.js');
$js=str_replace('<portal_api>', PANEL_API, $js);
$js=str_replace('<portal_url>', PANEL_URL, $js);
echo $js;
?>