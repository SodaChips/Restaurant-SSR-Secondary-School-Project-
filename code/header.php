<!DOCTYPE html>
<html>
     <head>
          <title> Sistem Tempahan Restoran SSR </title>
          <link rel = "website icon" type= "png"
          href = "gambar/pizza icon.png">
          <style>
               *{
                    margin:0;
                    padding:0;
               }
               
               body {
                    background-color: #FAF3E0;
                    text-align: center;
                    font-family: Arial, sans-serif;
               }

               header {
                    background-color: #B22222;
                    color: #FFD700;
               }

               header h1 {
                    font-size: 3rem;
                    text-shadow: 2px 2px 5px #4B2C20;
               }

               header h4 {
                    color: #FAF3E0;
                    font-size: 1.2rem;
                    margin-top: 5px;
               }

               footer {
                    background-color: #4B2C20;
                    color: #FAF3E0;
                    padding: 10px;
                    position: fixed;
                    width: 100%;
                    bottom: 0;
               }

               article{
                    padding: 5px;
                    text-align: center;
               }

               table {
                    background-color: #FAF3E0;
                    color: #4B2C20;
                    width: 100%;
                    margin: 20px auto;
                    border-collapse: collapse;
               }

               td {
                    padding: 15px;
                    border: 1px solid #DDD;
               }

               tr:hover {
                    background-color: #B22222;
                    color: #FAF3E0;
               }

               nav {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: #e7e7e7;
                    padding: 0px; 
                    
               }

               nav a {
                    padding: 8px 18px; 
                    margin: 0 8px; 
                    background-color: #4B2C20;
                    color: #FAF3E0;
                    text-decoration: none;
                    border-radius: 18px;
                    font-size: 1rem; 
                    line-height: 1.5; 
                    transition: all 0.3s ease;
               }

               nav a:hover {
                    background-color: #FFD700;
                    color: #4B2C20;
               }

              input, select, button {
                    padding: 10px;
                    margin: 8px 0;
                    border: 1px solid #DDD;
                    border-radius: 8px;
                    transition: box-shadow 0.3s ease;
               }

               body div{
                    background-color: #e7e7e7;
               }
               video{
                    max-width: 67%;
                    max-height: 67%;
               }

               tr td a {
               font-size: 17px;
               background: transparent;
               border: none;
               padding: 1em 1.5em;
               color: #1e1e2b;
               text-transform: uppercase;
               position: relative;
               transition: 0.5s ease;
               cursor: pointer;
               }

               tr td a::before {
               content: "";
               position: absolute;
               left: 0;
               bottom: 0;
               height: 2px;
               width: 0;
               background-color: #ffc506;
               transition: 0.5s ease;
               }

               tr td a:hover {
               color: #B22222;
               transition-delay: 0.5s;
               z-index: 2;
               }

               tr td a:hover::before {
               width: 100%;
               }

               tr td a::after {
               content: "";
               position: absolute;
               left: 0;
               bottom: 0;
               height: 0;
               width: 100%;
               background-color: #ffc506;
               transition: 0.4s ease;
               z-index: -1;
               }

               tr td a:hover::after {
               height: 100%;
               transition-delay: 0.4s;
               color: aliceblue;
               }

               caption a{
                    margin:10px;
                    color:#9c7f49;
               }
          </style>
     </head>
     <body>
          
<header>
<!-- Tajuk sistem . Akan dipaperkan atas antaramuka -->
<h1 align = 'center'> Sistem Tempahan Restoran SSR </h1?>
<h4 align = 'center'> Come and Give a Shot</h4>
<hr> <nav align='center'>
</header>

<nav>
<?php 
# Untuk memaparkan bilangan pada cart
if(isset($_SESSION['orders'])){
    $bil = "<span style= 'color:red;'>[".count($_SESSION['orders'])."]</span>";
} else { $bil = "";} ?>
  
<?php if (!empty($_SESSION['tahap'])){ ?>

   <!-- Menu admin : dipaparkan sekiranya admin login -->
   <?php if ($_SESSION['tahap']=="ADMIN"){ ?>
      
        <a href = 'menu.php'>Menu</a>
        <a href = 'tempahan-cart.php'>Cart<?=$bil ?></a>
        <a href = 'tempahan-sejarah.php'>Sejarah Tempahan</a>
        <a href = 'pengguna-senarai.php'>Senarai pengguna</a>
        <a href = 'menu-senarai.php'>Senarai menu</a>
        <a href = 'laporan.php'>Laporan Tempahan</a>
        <a href = 'logout.php'>Log Out</a>
      
   <?php }  else if ($_SESSION['tahap']=="PEMBELI"){ ?>
   <!--Menu pembeli : dipaparkan sekiranya pembeli login -->
        <a href = 'menu.php'>Menu</a>
        <a href = 'tempahan-cart.php'>Cart<?=$bil ?></a>
        <a href = 'tempahan-sejarah.php'>Sejarah Tempahan</a>
        <a href = 'logout.php'>Log Out</a>
        <?php } ?>

<?php } else{ ?>
<!--Menu Laman Utama : dipaparkan sekiranya admiin atau pembeli tidak login -->
      <a href = 'index.php'>Laman Utama</a>
      <a href = 'login.php'>Log Masuk</a>
      <a href = 'signup.php'>Daftar Sini</a>
<?php } ?>
 <hr>
<article align = 'center'>
</nav>