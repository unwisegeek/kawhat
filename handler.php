<html>
<body>
<?php
session_start();
$val1 = $_POST["Value1"];
$val2 = $_POST["Value2"];
$response = exec('./ifttt.py "' . $val1 . '" "' . $val2 . '" > /dev/null');
echo $response;
echo '<script />';
echo 'window.location.replace("https://unwisegeek.net/kawhat/index.php?name='. $val1 . '");';
echo '</script />';
?>
</body>
</html>
