<?php

$br = '<br \>';
$brbr = $br . $br;

echo '<html \>';
echo '<head \>';
echo '<title \>Welcome to Quizlish!</title \>';
echo '</head \>';

$file = './tmp/' . uniqid() . '.qz';

exec('./makequiz.py > ' . $file);
$pagedata = fopen($file, "r") or die("Unable to open file.");
echo fread($pagedata,filesize($file));
fclose($pagedata);
exec('rm -f ' . $file);

echo '</html \>';
?>
