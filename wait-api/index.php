<?php
ini_set("display_errors", "0");

$MAX_SECONDS = 60;
$TIMEOUT = 10;
if (array_key_exists("s", $_GET)) {
    $TIMEOUT = (int)$_GET["s"];
    if ($MAX_SECONDS < $TIMEOUT) $TIMEOUT = $MAX_SECONDS;
}
sleep($TIMEOUT);
echo "Waited $TIMEOUT seconds.";
?>
