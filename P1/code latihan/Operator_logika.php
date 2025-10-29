<?php
// Gunakan operator perbandingan dengan benar
$b = (4 != 4);        // “!=” artinya “tidak sama dengan”
$c = (3 + 7 == 10);   // “==” artinya “sama dengan”

// $b dan $c sekarang bernilai boolean true/false

$a = ($b and $c);
echo "\$a = " . ($a ? 'true' : 'false') . "<br>\n";

$a = ($b or $c);
echo "\$a = " . ($a ? 'true' : 'false') . "<br>\n";

$a = ($b xor $c);
echo "\$a = " . ($a ? 'true' : 'false') . "<br>\n";

$a = ((!$b) or $c);
echo "\$a = " . ($a ? 'true' : 'false') . "<br>\n";

$a = ($b && $c);
echo "\$a = " . ($a ? 'true' : 'false') . "<br>\n";

$a = ($b || $c);
echo "\$a = " . ($a ? 'true' : 'false') . "<br>\n";
?>
