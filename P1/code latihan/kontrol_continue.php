<?php
for ($i = 1; $i <= 10; $i++) {
    if (! ($i % 2)) {
        // jika $i mod 2 = 0 → bilangan genap → lewati
        continue;
    }
    echo "\$i = $i <br>\n";
}
?>
