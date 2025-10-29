<?php
$a = 10;
$b = 3;

echo "\$a = $a <br>\n";
echo "\$b = $b <br>\n";

echo '$a + $b = ';
print($a + $b);
echo "<br>\n";

echo '$a - $b = ';
print($a - $b);
echo "<br>\n";

echo '$a * $b = ';
print($a * $b);
echo "<br>\n";

echo '$a / $b = ';
if ($b != 0) {
    // Menampilkan hingga 2 angka desimal, misalnya
    echo number_format($a / $b, 2);
} else {
    echo 'Error: pembagian dengan nol';
}
echo "<br>\n";

echo '$a % $b = ';
if ($b != 0) {
    print($a % $b);
} else {
    echo 'Error: modulus dengan nol';
}
echo "<br>\n";
?>

