<?php
# Memulakan fungsi session dan memanggil fail header.php
session_start();
include('header.php');
?>
<!-- Bahagian Borang(form) Login -->
 <h3> Pendaftaran Pembeli Baru (SIGN UP) </h3>
 <p> Sila Lengkapkan Maklumat di bawah </p>
 <form action = ' ' method = 'POST'>
    Nama  <input required type = 'text'        name = 'nama'><br>
    Notel <input required type = 'text'        name = 'notel'><br>
    Pass  <input required type = 'password'    name = 'katalaluan'><br>
          <input required type = 'submit'      value = 'Simpan'>
</form>

<?php
# Bahagian proses login
# Menyemak kewujudan data POST
if(!empty($_POST)) {

    # Memanggil fail connection
    include('connection.php');

    # Mengambil data daripada borang (form)
    $nama       = $_POST['nama'];
    $notel      = $_POST['notel'];
    $katalaluan = $_POST['katalaluan'];

    # Data validation : had atas
    if(strlen($notel) > 12) {
        die("<script>
                alert('No Telefon Lebih 12 Digit');
                location.href = 'signup.php' ; 
            </script>");
    }

     # Data validation : had bawah
     if(strlen($notel) < 10) {
        die("<script>
                alert('No Telefon Kurang 10 Digit');
                location.href = 'signup.php' ; 
            </script>");
    }

    # Semak notel dah wujud atau belum
    $sql_semak = "select notel from pengguna where notel = '$notel' ";

    $laksana_semak = mysqli_query($condb,$sql_semak);

    if(mysqli_num_rows($laksana_semak) == 1) {
        die("<script>
                alert('Notel telah digunakan. Sila guna Notel yang laim');
                location.href = 'signup.php' ; 
            </script>");
    }

    # proses menyimpan data
    $sql_simpan = "insert into pengguna
                  (notel , nama , katalaluan , tahap)
                  values
                  ('$notel','$nama','$katalaluan','PEMBELI')";

    $laksana = mysqli_query($condb , $sql_simpan);

    # Pengujian proses menyimpan data
    if($laksana) {
        # jika berjaya
        echo "<script>
                alert('Pendaftaran Berjaya');
                location.href = 'login.php' ;
             </script>";
    } else{
        # jika gagal paapr punca error
        echo "<p style = 'color:red;' > Pendaftaran Gagal </p>";
        echo $sql_simpan.mysqli_error($condb);
    }
}
?>
<img src='gambar/welcome.png' width='100%'>
<?php include('footer.php'); ?>