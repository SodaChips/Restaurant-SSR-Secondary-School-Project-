<?php
# Memulakan session
session_start();

# Mengistiharkan tatasusun session ['orders'] jika belum wujud
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = array();
}

# Menambah elemen ke dalam session['orders']
array_push($_SESSION['orders'] , $_GET['id_menu']);
if($_GET['page'] == "menu") {
    echo "<script> window.location.href='menu.php?jenis=".$_GET['jenis']." '; </script>";
}
else {
    echo"<script> window.location.href='tempahan-cart.php'; </script>";
}

?>