<?php #あいう
ini_set("display_errors", "0");

$MODE = "default";
if (array_key_exists('mode', $_REQUEST)) {
    $MODE = $_REQUEST['mode'];
}
$TYPE = "html";
if (array_key_exists('type', $_REQUEST)) {
    $TYPE = $_REQUEST['type'];
}
$SOURCE = "";
if (array_key_exists('source', $_REQUEST)) {
    $SOURCE = $_REQUEST['source'];
}

$encoded = "";
$type_html_checked = "";
$type_url_checked = "";
$type_base64_checked = "";
if ($TYPE === "html") {
    $encoded = htmlspecialchars($SOURCE, ENT_QUOTES);
    $type_html_checked = "checked";
} else if ($TYPE === "url") {
    $encoded = urlencode($SOURCE);
    $type_url_checked = "checked";
} else if ($TYPE === "base64") {
    $encoded = base64_encode($SOURCE);
    $type_base64_checked = "checked";
}

$v = array(
    'source' => $SOURCE,
    'encoded' => $encoded,
    'type_html_checked' => $type_html_checked,
    'type_url_checked' => $type_url_checked,
    'type_base64_checked' => $type_base64_checked,
);



?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<title>Multi Encoder</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<style type="text/css">
.textarea {
    width: 90%;
    height: 80px;
}
</style>

<body>

<h1><a href="./">Muti Encoder</a></h1>

<div>
<form action="./" method="post">
    <div>
        <div>Source:</div>
        <div><textarea class="textarea" name="source"><?=htmlspecialchars($v['source'], ENT_QUOTES)?></textarea></div>
    </div>
    <ul>
        <li><input type="radio" name="type" value="html" <?=$v['type_html_checked']?> /><span>html</span></li>
        <li><input type="radio" name="type" value="url" <?=$v['type_url_checked']?> /><span>url</span></li>
        <li><input type="radio" name="type" value="base64" <?=$v['type_base64_checked']?> /><span>base64</span></li>
    </ul>
    <div>
        <div>Encoded:</div>
        <div><textarea class="textarea" onclick="this.select();"><?=htmlspecialchars($v['encoded'], ENT_QUOTES)?></textarea></div>
    </div>
    <input type="hidden" name="mode" value="posted" />
    <div style="margin-top:10px;"><input type="submit" value="Encode" /></div>
</form>
</div>

<div style="margin-top:10px;"><a href="/">Link to Back</a></div>

</body>
</html>
