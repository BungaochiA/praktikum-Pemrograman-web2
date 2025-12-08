<?php
include "conn.php";

$query = mysqli_query($conn, "SELECT COUNT(id_peserta) FROM peserta");
$row = mysqli_fetch_row($query);
$totalData = $row[0];

$perPage = 5; 
$totalPages = ceil($totalData / $perPage);

$pageNow = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($pageNow < 1) $pageNow = 1;
if ($pageNow > $totalPages) $pageNow = $totalPages;

$start = ($pageNow - 1) * $perPage;

$dataQuery = mysqli_query($conn, "SELECT * FROM peserta LIMIT $start, $perPage");

$pagination = "<nav><ul class='pagination justify-content-center'>";

if ($pageNow > 1) {
    $prev = $pageNow - 1;
    $pagination .= "<li class='page-item'><a class='page-link' href='?page=$prev'>Previous</a></li>";
}

for ($i = 1; $i <= $totalPages; $i++) {
    $active = ($i == $pageNow) ? "active" : "";
    $pagination .= "<li class='page-item $active'><a class='page-link' href='?page=$i'>$i</a></li>";
}

if ($pageNow < $totalPages) {
    $next = $pageNow + 1;
    $pagination .= "<li class='page-item'><a class='page-link' href='?page=$next'>Next</a></li>";
}

$pagination .= "</ul></nav>";
?>
