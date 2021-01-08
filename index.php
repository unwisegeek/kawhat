<?php
echo '<html \>';
echo '<head \>';
echo '<title \>Welcome to Kawhat?</title \>';
echo '</head \>';
echo '<body \>';
echo '<p \>';
echo '<form action="handler.php" method="post" \>';

if (isset($_GET["name"])) {
  $name = $_GET["name"];
  echo 'Name: ' . $name . ' <input type="hidden" name="Value1" value="' . $name . '" \><br \><br \>';
} else {
  echo 'Name: ' . '<input type="text" name="Value1" \><br \><br \>';
}


echo 'Which is the <em \>false</em \> fact?<br \>';
echo '<input type="radio" name="Value2" value="1" \> Fact 1<br \>';
echo '<input type="radio" name="Value2" value="2" \> Fact 2<br \>';
echo '<input type="radio" name="Value2" value="3" \> Fact 3<br \>';
echo '<input type="submit" \>';
echo '</form \>';
echo '</p \>';
echo '</body \>';
echo '</html \>';
?>
