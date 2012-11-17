<?php
ini_set("display_errors", "0");

$CODE = 200;
if (array_key_exists("c", $_GET)) {
    $CODE = (int)$_GET["c"];
}

$STATUSES = array(
    200 => array(
        'http' => '1.0'
        ,'meaning' => 'OK'
    ),
    301 => array(
        'http' => '1.0'
        ,'meaning' => 'Moved Permanently'
    ),
    302 => array(
        'http' => '1.0'
        ,'meaning' => 'Moved Temporarily'
    ),
    304 => array(
        'http' => '1.0'
        ,'meaning' => 'Not Modified'
    ),
    403 => array(
        'http' => '1.0'
        ,'meaning' => 'Forbidden'
    ),
    404 => array(
        'http' => '1.0'
        ,'meaning' => 'Not Found'
    ),
    500 => array(
        'http' => '1.0'
        ,'meaning' => 'Internal Server Error'
    ),
);

// MIYASUI YOUNI
header('Content-type: text/plain');

// Header creating
function create_http_status_code_header($code) {
    global $STATUSES;
    if (array_key_exists($code, $STATUSES)) {
        $status = $STATUSES[$code];
        return "HTTP/{$status['http']} {$code} {$status['meaning']}";
    }
    exit("No configuration or bad status code");
}
$STATUS_HEADER = create_http_status_code_header($CODE);

// Status setting
header($STATUS_HEADER, false, $CODE);

if ($CODE === 301 || $CODE === 302) {
    header('Location: http://google.com/');
}

echo "Code: $CODE\n";
echo "Header: \"$STATUS_HEADER\"\n";
?>
