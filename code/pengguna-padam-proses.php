<?php
# Memulakan fungsi session
session_start();

# Memanggil fail kawalan-admin.php
include('kawalan-admin.php');

# Menyemak kewujudan data GET notel pengguna
if(!empty($_GET))
{
    # Memanggil fail connection
    include('connection.php');

    # Arahan SQL untuk memadam data pengguna berdasarkan notel yang dihantar
    $arahan     =  " delete from pengguna where notel='".$_GET['notel']."' ";

    # Melaksanakan arahan SQL padam data dan menguji proses padam data
    if(mysqli_query($condb , $arahan))
    {
        # Jika data berjaya dipadam
        echo "<script> alert('Padam data Berjaya');
             window.location.href='pengguna-senarai.php'; </script>";
    }
    else
    {
        # Jika data gagal dipadam
        # die(mysqli_error($condb); echo $arahan);
        echo "<script> alert('Padam data Gagal');
             window.location.href='pengguna-senarai.php'; </script>";
    }
}
else
{
    # Jika data GET tidak wujud (empty)
    die("<script> alert('Ralat! akses secara terus');
         window.location.href='pengguna-senarai.php'; </script>");
}
?>