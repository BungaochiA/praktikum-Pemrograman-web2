<?php
$x = 4;

$a = ($x == 4);
echo "\$a = " . ($a ? 'true' : 'false') . "<br>\n";

$b = ($x === "4");
echo "\$b = " . ($b ? 'true' : 'false') . "<br>\n";

$c = ($x != 4);
echo "\$c = " . ($c ? 'true' : 'false') . "<br>\n";

$d = ($x !== "4");
echo "\$d = " . ($d ? 'true' : 'false') . "<br>\n";

$e = ($x < 5);
echo "\$e = " . ($e ? 'true' : 'false') . "<br>\n";

$f = ($x > 5);
echo "\$f = " . ($f ? 'true' : 'false') . "<br>\n";

$g = ($x <= 4);
echo "\$g = " . ($g ? 'true' : 'false') . "<br>\n";

$h = ($x >= 5);
echo "\$h = " . ($h ? 'true' : 'false') . "<br>\n";
?>
