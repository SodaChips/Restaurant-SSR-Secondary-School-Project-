<?php
# Memulakan fungsi session
session_start();

# Memanggil fail kawalan-admin.php 
include('kawalan-admin.php');

# Menyemak kewujudan data GET id_menu
if(!empty($_GET))
{
    # Memanggil fail connection
    include('connection.php');

    # Arahan SQL untuk memadam data pengguna berdasarkan id_menu yang dihantar
    $arahan     =       " delete from menu where id_menu='".$_GET['id_menu']."' " ;

    # Melaksanakan arahan SQL padam data dan menguji proses padam data
    if(mysqli_query($condb , $arahan))
    {
        # Jika data berjaya dipadam
        echo "<script> alert('Padam data Berjaya');
              window.location.href='menu-senarai.php'; </script>";
    }
    else
    {
         # Jika data gagal dipadam
         echo "<script> alert('Padam data Gagal');
               window.location.href='menu-senarai.php'; </script>";
    }
}
else
{
     # Jika data GET tidak wujud (empty)
     die("<script> alert('Ralat! akses secara terus');
           window.location.href='menu-senarai.php'; </script>");
}
?>