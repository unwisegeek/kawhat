<?php

$br = '<br \>';
$brbr = $br . $br;

echo '<html \>';
echo '<head \>';
echo '<title \>Welcome to Kawhat?</title \>';
echo '</head \>';
echo '<body \>';
echo '<p \>';
echo '<form action="handler.php" method="post" \>';

if (isset($_GET["name"])) {
  $name = $_GET["name"];
  echo 'Name: ' . $name . ' <input type="hidden" name="Value1" value="' . $name . '" \>' . $brbr;
} else {
  echo 'Name: ' . '<input type="text" name="Value1" \>' . $brbr;
}
date_default_timezone_set("UTC");
$now_time = date("F j, Y, G:i:s");
echo "Current Time: " . $now_time . $brbr;


echo 'Which is the <em \>false</em \> fact?' . $br;
echo '<input type="radio" name="Value2" value="1" \> Fact 1' . $br;
echo '<input type="radio" name="Value2" value="2" \> Fact 2' . $br;
echo '<input type="radio" name="Value2" value="3" \> Fact 3' . $br;
echo '<input type="hidden" name="timestamp" value="' . $now_time . '" \>' . $br;
echo '<input type="submit" \>';
echo '</form \>';
echo '</p \>';

if (isset($_GET["last_answer"])) {
    if (isset($_GET["last_time"])) {
        $answer = $_GET["last_answer"];
        $last_time = $_GET["last_time"];
        echo '<hr \>' . $br;
        echo 'Last Answer: ' . $answer . $br;
        echo '  Timestamp: ' . $last_time . $br;
    }
}

echo '</body \>';
echo '</html \>';
?>
