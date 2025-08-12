<?php

if (isset($_GET['x']) && isset($_GET['y']) && isset($_GET['x1']) && isset($_GET['y1']) && isset($_GET['b1']) && isset($_GET['b2']) && isset($_GET['b3']) && isset($_GET['b4'])) {
    $x = $_GET['x'];
    $y = $_GET['y'];
    $x1 = $_GET['x1'];
    $y1 = $_GET['y1'];
    $b1 = $_GET['b1'];
    $b2 = $_GET['b2'];
    $b3 = $_GET['b3'];
    $b4 = $_GET['b4'];
} else {
    $x = 0;
    $y = 0;
    $x1 = 0;
    $y1 = 0;
    $b1 = 0;
    $b2 = 0;
    $b3 = 0;
    $b4 = 0;
}

exec("sudo /var/www/html/py/venv/bin/python /var/www/html/py/myserial.py {$x} {$y} {$x1} {$y1} {$b1} {$b2} {$b3} {$b4} 2>&1", $output, $retval);
echo "<pre>";
print_r($output);
echo "</pre>";
?>