<html>
<body>
<?php
session_start();

// Start building the command to trigger the IFTTT Webhook

$cmd = './ifttt.py ';

// Add the test taker's name as the first argument.

$cmd = $cmd . '"' . $_POST["name"] . '" ';

// Loop through remaining arguments to add give additional answers to ifttt.py

foreach($_POST as $key => $value) {
    if (strstr($key, 'answer')) {
        $num = str_replace('answer', '', $key);
        $cmd = $cmd . '"' . $num . '=' . $value . '" ';
    }
}

// Finally, add /dev/null as the output direction so user isn't shown Webhook backend.

$cmd = $cmd . ' > /dev/null';

// Execute the command.

$response = exec($cmd);

// Set up the redirect to success.html in the current directory.

$redirect = str_replace('handler.php', 'success.html', $_SERVER['PHP_SELF']);

// Redirect user to success message.

echo '<script />';
echo 'window.location.replace("https://unwisegeek.net' . $redirect . '");';
echo '</script />';
?>
</body>
</html>
