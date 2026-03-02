<?php
function validateNumber($num) {
    return ($num >= 0); 
}

function computeTotal($price, $qty) {
    return $price * $qty;
}

function redirect($url) {
    header("Location: $url");
    exit();
}
?>
<link rel="stylesheet" href="style.css">