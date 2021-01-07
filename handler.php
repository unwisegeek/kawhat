<html>
<body>
<?php
session_start();
$val1 = $_POST["Value1"];
$val2 = $_POST["Value2"];
$response = exec('./pingiftt.sh "' . $val1 . '" "' . $val2 . '"')
echo '<script />';
echo 'window.location.replace("https://unwisegeek.net/kawhat/index.html);';
echo '</script />';
?>
</body>
</html>
